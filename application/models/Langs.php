<?php 
class Langs extends CI_Model{
    public function currentIndex()
    {
        switch ($this->session->userdata('lang')) {
            case 'en':
                return 1;
            case 'tr':
                return 2;
            case 'jp':
                return 3;
            case 'de':
                return 4;
            case 'ru':
                return 5;
            case 'zh':
                return 6;
            case 'fr':
                return 7;
            case 'pt':
                return 8;
            case 'hi':
                return 9;
            case 'ar':
                return 10;
            case 'es':
            default:
                return 0;
        }
    }

    public function current()
    {
        $languages = $this->lang();
        $index = $this->currentIndex();

        return isset($languages[$index]) ? $languages[$index] : $languages[0];
    }

    public function rebrandText($lang = null)
    {
        return $this->getRebrandTextData($lang ?: ($this->session->userdata('lang') ?: 'es'));
    }

    private function getConfigRow()
    {
        return (array) $this->db->get('config')->row_array();
    }

    private function getVisitsRow()
    {
        return (array) $this->db->get('visits')->row_array();
    }

    private function getTinymceLanguage($lang)
    {
        switch ($lang) {
            case 'jp':
                return 'ja';
            case 'zh':
                return 'zh-Hans';
            case 'fr':
                return 'fr_FR';
            case 'pt':
                return 'pt_BR';
            default:
                return $lang ?: 'es';
        }
    }

    private function getRebrandTextData($lang)
    {
        $default = array(
            'site_nav_subtitle' => 'Intersect Engine CMS',
            'home_hero_kicker' => 'Open Source CMS for Intersect Engine',
            'home_default_lead' => 'An open source foundation for presenting, extending and adapting projects built with Intersect Engine.',
            'home_default_feature_one_title' => 'Presentation',
            'home_default_feature_one_text' => 'A clearer, more reusable landing page for projects that need a stronger public presence from the first visit.',
            'home_default_feature_two_title' => 'Adaptability',
            'home_default_feature_two_text' => 'Sections built to swap copy, colors and actions without forcing a full visual rebuild every time.',
            'home_default_feature_three_title' => 'Community',
            'home_default_feature_three_text' => 'Room for news, downloads, dashboards and useful project data without locking the CMS to one game format.',
            'home_support_title' => 'Designed to fit different kinds of projects',
            'home_support_text' => 'The goal is to give any community a homepage they can reuse quickly, customize easily and make their own.',
            'home_story_title' => 'Open source, reusable and easy to edit',
            'home_story_text' => 'This homepage is meant to be a starting layer: enough identity to feel current, enough flexibility to stay useful across many projects.',
            'home_story_card_one_eyebrow' => 'Activity',
            'home_story_card_two_eyebrow' => 'Users',
            'home_story_card_three_eyebrow' => 'Uptime',
            'home_final_title' => 'A better visual base for Intersect Engine CMS',
            'home_final_text' => 'The goal is not to force a specific fantasy setting, but to provide a modern, editable entry point for any project built on Intersect Engine.',
            'site_footer_tagline' => 'Open source web foundation for projects built with Intersect Engine.',
            'site_footer_description' => 'Made to be customized, maintained on GitHub and adapted easily to different communities.',
            'site_footer_explore' => 'Explore',
            'site_footer_project' => 'Project',
            'site_footer_legal' => 'Legal',
            'modal_login_text' => 'Access your CMS account to manage content, users and project settings.',
            'modal_register_text' => 'Create a base account for your project and start adapting the CMS to your own community.',
            'modal_ticket_text' => 'Open a support ticket to report issues, ask for help or document project tasks.',
            'ticket_type_ingame' => 'In-game issue',
            'ticket_type_account' => 'Account',
            'ticket_type_billing' => 'Purchases',
            'ticket_type_web' => 'Website',
            'admin_sidebar_overview' => 'Overview',
            'admin_sidebar_content' => 'Content',
            'admin_sidebar_world' => 'World',
            'admin_sidebar_community' => 'Community',
            'admin_sidebar_system' => 'System',
            'admin_sidebar_back_to_site' => 'Back to site',
            'admin_sidebar_source_code' => 'Source code',
            'admin_dashboard_eyebrow' => 'Control panel',
            'admin_dashboard_title' => 'Project operations',
            'admin_dashboard_text' => 'A clearer workspace for reviewing activity, server state and key project signals at a glance.',
            'admin_metrics_title' => 'Live metrics',
            'admin_metrics_text' => 'Core account and server indicators updated from the current environment.',
            'admin_chart_title' => 'Monthly visits',
            'admin_chart_text' => 'Quick visual history for the current yearly traffic cycle.',
        );

        $translations = array(
            'es' => array(
                'home_default_lead' => 'Una base open source para presentar, extender y adaptar proyectos creados con Intersect Engine.',
                'home_default_feature_one_title' => 'Presentacion',
                'home_default_feature_one_text' => 'Una portada mas clara y reutilizable para proyectos que necesitan una presencia publica solida desde el primer vistazo.',
                'home_default_feature_two_title' => 'Adaptacion',
                'home_default_feature_two_text' => 'Bloques pensados para cambiar textos, colores y accesos sin tener que rehacer toda la estructura visual.',
                'home_default_feature_three_title' => 'Comunidad',
                'home_default_feature_three_text' => 'Espacio para noticias, descargas, paneles y datos utiles sin cerrarlo a un tipo concreto de juego.',
                'home_support_title' => 'Pensado para adaptarse a distintos proyectos',
                'home_support_text' => 'La idea es que cualquier comunidad pueda usar esta portada como base, personalizarla rapido y hacerla propia.',
                'home_story_title' => 'Open source, reutilizable y facil de editar',
                'home_story_text' => 'Este home busca funcionar como punto de partida: suficiente identidad para verse actual, suficiente flexibilidad para no encerrar tu proyecto.',
                'home_story_card_one_eyebrow' => 'Actividad',
                'home_story_card_two_eyebrow' => 'Usuarios',
                'home_story_card_three_eyebrow' => 'Tiempo activo',
                'home_final_title' => 'Una mejor base visual para Intersect Engine CMS',
                'home_final_text' => 'La meta no es imponer una fantasia concreta, sino ofrecer una entrada moderna y editable para cualquier proyecto construido sobre Intersect Engine.',
                'site_footer_tagline' => 'Base web open source para proyectos creados con Intersect Engine.',
                'site_footer_description' => 'Pensado para personalizarse, mantenerse en GitHub y adaptarse con facilidad a distintas comunidades.',
                'site_footer_explore' => 'Explorar',
                'site_footer_project' => 'Proyecto',
                'modal_login_text' => 'Accede a tu cuenta del CMS para gestionar contenido, usuarios y ajustes del proyecto.',
                'modal_register_text' => 'Crea una cuenta base para tu proyecto y empieza a adaptar el CMS a tu propia comunidad.',
                'modal_ticket_text' => 'Abre un ticket de soporte para reportar problemas, pedir ayuda o documentar tareas del proyecto.',
                'ticket_type_ingame' => 'Error ingame',
                'ticket_type_account' => 'Cuenta',
                'ticket_type_billing' => 'Compras',
                'ticket_type_web' => 'Web',
                'admin_sidebar_overview' => 'Resumen',
                'admin_sidebar_content' => 'Contenido',
                'admin_sidebar_world' => 'Mundo',
                'admin_sidebar_community' => 'Comunidad',
                'admin_sidebar_system' => 'Sistema',
                'admin_sidebar_back_to_site' => 'Volver al sitio',
                'admin_sidebar_source_code' => 'Codigo fuente',
                'admin_dashboard_eyebrow' => 'Panel de control',
                'admin_dashboard_title' => 'Operaciones del proyecto',
                'admin_dashboard_text' => 'Un espacio mas claro para revisar actividad, estado del servidor y senales clave del proyecto de un vistazo.',
                'admin_metrics_title' => 'Metricas en vivo',
                'admin_metrics_text' => 'Indicadores principales de cuentas y servidor actualizados desde el entorno actual.',
                'admin_chart_title' => 'Visitas mensuales',
                'admin_chart_text' => 'Historial visual rapido del ciclo anual de trafico actual.',
            ),
            'tr' => array(
                'home_hero_kicker' => 'Intersect Engine icin Acik Kaynak CMS',
                'home_default_lead' => 'Intersect Engine ile olusturulan projeleri sunmak, genisletmek ve uyarlamak icin acik kaynak bir temel.',
                'home_default_feature_one_title' => 'Sunum',
                'home_default_feature_one_text' => 'Ilk andan itibaren daha guclu bir gorunum isteyen projeler icin daha acik ve yeniden kullanilabilir bir anasayfa.',
                'home_default_feature_two_title' => 'Uyarlanabilirlik',
                'home_default_feature_two_text' => 'Metinleri, renkleri ve eylemleri tum tasarimi bastan kurmadan degistirebilmeniz icin hazirlanan bolumler.',
                'home_default_feature_three_title' => 'Topluluk',
                'home_default_feature_three_text' => 'CMSi tek bir oyun bicimine kilitlemeden haberler, indirmeler, paneller ve yararli proje verileri icin alan.',
                'home_support_title' => 'Farkli proje turlerine uyum saglamak icin tasarlandi',
                'home_support_text' => 'Amac, her topluluga hizlica yeniden kullanabilecekleri, kolayca ozellestirebilecekleri ve sahiplenebilecekleri bir anasayfa vermek.',
                'home_story_title' => 'Acik kaynak, yeniden kullanilabilir ve duzenlemesi kolay',
                'home_story_text' => 'Bu anasayfa bir baslangic katmani olarak tasarlandi: guncel hissettirecek kadar kimlik, farkli projelerde ise yarayacak kadar esneklik.',
                'home_story_card_one_eyebrow' => 'Etkinlik',
                'home_story_card_two_eyebrow' => 'Kullanicilar',
                'home_story_card_three_eyebrow' => 'Calisma suresi',
                'home_final_title' => 'Intersect Engine CMS icin daha iyi bir gorsel temel',
                'home_final_text' => 'Amac belirli bir fantezi evreni dayatmak degil, Intersect Engine uzerinde kurulan her proje icin modern ve duzenlenebilir bir giris noktasi sunmak.',
                'site_footer_tagline' => 'Intersect Engine ile olusturulan projeler icin acik kaynakli web temeli.',
                'site_footer_description' => 'GitHub uzerinde surdurulebilmesi ve farkli topluluklara kolayca uyarlanabilmesi icin tasarlandi.',
                'site_footer_explore' => 'Kesfet',
                'site_footer_project' => 'Proje',
                'site_footer_legal' => 'Yasal',
                'modal_login_text' => 'Icerigi, kullanicilari ve proje ayarlarini yonetmek icin CMS hesabiniza giris yapin.',
                'modal_register_text' => 'Projeniz icin temel bir hesap olusturun ve CMSi kendi toplulugunuza gore uyarlamaya baslayin.',
                'modal_ticket_text' => 'Sorun bildirmek, yardim istemek veya proje gorevlerini kayda gecirmek icin destek bileti acin.',
                'ticket_type_ingame' => 'Oyun ici hata',
                'ticket_type_account' => 'Hesap',
                'ticket_type_billing' => 'Satin alimlar',
                'ticket_type_web' => 'Web sitesi',
                'admin_sidebar_overview' => 'Genel bakis',
                'admin_sidebar_content' => 'Icerik',
                'admin_sidebar_world' => 'Dunya',
                'admin_sidebar_community' => 'Topluluk',
                'admin_sidebar_system' => 'Sistem',
                'admin_sidebar_back_to_site' => 'Siteye don',
                'admin_sidebar_source_code' => 'Kaynak kod',
                'admin_dashboard_eyebrow' => 'Kontrol paneli',
                'admin_dashboard_title' => 'Proje operasyonlari',
                'admin_dashboard_text' => 'Etkinligi, sunucu durumunu ve temel proje sinyallerini hizlica gormek icin daha net bir calisma alani.',
                'admin_metrics_title' => 'Canli metrikler',
                'admin_metrics_text' => 'Mevcut ortamdan guncellenen temel hesap ve sunucu gostergeleri.',
                'admin_chart_title' => 'Aylik ziyaretler',
                'admin_chart_text' => 'Guncel yillik trafik dongusu icin hizli gorsel gecmis.',
            ),
            'jp' => array(
                'home_hero_kicker' => 'Intersect Engine no tame no Open Source CMS',
                'home_default_lead' => 'Intersect Engine de tsukurareta purojekuto o miseru, kakucho suru, saitekika suru tame no open source no kiban desu.',
                'home_default_feature_one_title' => 'Presentation',
                'home_default_feature_one_text' => 'Saisho no houmon kara motto tsutawari yasui, saiyori yoi toppage no kiso o teikyo shimasu.',
                'home_default_feature_two_title' => 'Adaptability',
                'home_default_feature_two_text' => 'Tekisuto, iro, akushon o zenbu tsukuri naosazu ni irekae rareru you ni kosei sareteimasu.',
                'home_default_feature_three_title' => 'Community',
                'home_default_feature_three_text' => 'News, download, dashboard, purojekuto data o atsukai nagara mo hitotsu no game ni shibararenai you ni shimasu.',
                'home_support_title' => 'Samazama na purojekuto ni awaseru tame ni sekkei',
                'home_support_text' => 'Donna community demo sugu ni saiyou deki, kantan ni custom shite jibun no mononi dekiru toppage o mezashiteimasu.',
                'home_story_title' => 'Open source de, saiyou shi yasuku, henshuu mo kantan',
                'home_story_text' => 'Kono home wa start point toshite tsukuraremashita. Gendai teki na finkii to, iroiro na purojekuto ni tsukaeru juunansei o ryoritsu shimasu.',
                'home_story_card_one_eyebrow' => 'Activity',
                'home_story_card_two_eyebrow' => 'Users',
                'home_story_card_three_eyebrow' => 'Uptime',
                'home_final_title' => 'Intersect Engine CMS no tame no motto yoi visual base',
                'home_final_text' => 'Tokutei no fantasy setting o oshitsukeru no dewa naku, Intersect Engine purojekuto no tame no gendai teki de henshuu shi yasui iriguchi o teikyo shimasu.',
                'site_footer_tagline' => 'Intersect Engine purojekuto no tame no open source web base.',
                'site_footer_description' => 'GitHub de iji shi yasuku, samazama na community ni awasete henshuu shi yasui you ni tsukurareteimasu.',
                'site_footer_explore' => 'Explore',
                'site_footer_project' => 'Project',
                'site_footer_legal' => 'Legal',
                'modal_login_text' => 'CMS account ni login shite, content, users, project settings o kanri shimasu.',
                'modal_register_text' => 'Purojekuto no tame no basic account o tsukuri, jibun no community ni awasete CMS o kaizen shihajimemasu.',
                'modal_ticket_text' => 'Mondai houkoku, support irai, project task no kiroku no tame ni support ticket o sakusei shimasu.',
                'ticket_type_ingame' => 'In-game issue',
                'ticket_type_account' => 'Account',
                'ticket_type_billing' => 'Purchases',
                'ticket_type_web' => 'Website',
                'admin_sidebar_overview' => 'Overview',
                'admin_sidebar_content' => 'Content',
                'admin_sidebar_world' => 'World',
                'admin_sidebar_community' => 'Community',
                'admin_sidebar_system' => 'System',
                'admin_sidebar_back_to_site' => 'Back to site',
                'admin_sidebar_source_code' => 'Source code',
                'admin_dashboard_eyebrow' => 'Control panel',
                'admin_dashboard_title' => 'Project operations',
                'admin_dashboard_text' => 'A clearer workspace for reviewing activity, server state and key project signals at a glance.',
                'admin_metrics_title' => 'Live metrics',
                'admin_metrics_text' => 'Core account and server indicators updated from the current environment.',
                'admin_chart_title' => 'Monthly visits',
                'admin_chart_text' => 'Quick visual history for the current yearly traffic cycle.',
            ),
            'de' => array(
                'home_hero_kicker' => 'Open Source CMS fur Intersect Engine',
                'home_default_lead' => 'Eine Open-Source-Basis, um Projekte auf Intersect Engine zu prasentieren, zu erweitern und anzupassen.',
                'home_default_feature_one_title' => 'Prasentation',
                'home_default_feature_one_text' => 'Eine klarere und wiederverwendbare Startseite fur Projekte, die vom ersten Besuch an starker wirken sollen.',
                'home_default_feature_two_title' => 'Anpassbarkeit',
                'home_default_feature_two_text' => 'Bereiche, die Texte, Farben und Aktionen austauschbar machen, ohne jedes Mal das ganze Design neu aufzubauen.',
                'home_default_feature_three_title' => 'Community',
                'home_default_feature_three_text' => 'Platz fur News, Downloads, Dashboards und hilfreiche Projektdaten, ohne das CMS an nur ein Spielformat zu binden.',
                'home_support_title' => 'Fur unterschiedliche Projektarten gedacht',
                'home_support_text' => 'Das Ziel ist eine Startseite, die jede Community schnell wiederverwenden, leicht anpassen und zu ihrer eigenen machen kann.',
                'home_story_title' => 'Open Source, wiederverwendbar und leicht zu bearbeiten',
                'home_story_text' => 'Diese Startseite ist als Ausgangsbasis gedacht: genug Identitat fur einen modernen Eindruck, genug Flexibilitat fur viele Projekte.',
                'home_story_card_one_eyebrow' => 'Aktivitat',
                'home_story_card_two_eyebrow' => 'Benutzer',
                'home_story_card_three_eyebrow' => 'Laufzeit',
                'home_final_title' => 'Eine bessere visuelle Basis fur Intersect Engine CMS',
                'home_final_text' => 'Das Ziel ist nicht, ein bestimmtes Fantasy-Setting vorzugeben, sondern einen modernen und editierbaren Einstieg fur jedes Intersect-Engine-Projekt zu liefern.',
                'site_footer_tagline' => 'Open-Source-Webbasis fur Projekte mit Intersect Engine.',
                'site_footer_description' => 'Gebaut, um auf GitHub gepflegt und leicht an unterschiedliche Communities angepasst zu werden.',
                'site_footer_explore' => 'Entdecken',
                'site_footer_project' => 'Projekt',
                'site_footer_legal' => 'Rechtliches',
                'modal_login_text' => 'Melden Sie sich in Ihrem CMS-Konto an, um Inhalte, Benutzer und Projekteinstellungen zu verwalten.',
                'modal_register_text' => 'Erstellen Sie ein Basiskonto fur Ihr Projekt und passen Sie das CMS an Ihre eigene Community an.',
                'modal_ticket_text' => 'Erstellen Sie ein Support-Ticket, um Probleme zu melden, Hilfe anzufragen oder Projektaufgaben zu dokumentieren.',
                'ticket_type_ingame' => 'Ingame-Fehler',
                'ticket_type_account' => 'Konto',
                'ticket_type_billing' => 'Kaufe',
                'ticket_type_web' => 'Webseite',
                'admin_sidebar_overview' => 'Ubersicht',
                'admin_sidebar_content' => 'Inhalt',
                'admin_sidebar_world' => 'Welt',
                'admin_sidebar_community' => 'Community',
                'admin_sidebar_system' => 'System',
                'admin_sidebar_back_to_site' => 'Zuruck zur Seite',
                'admin_sidebar_source_code' => 'Quellcode',
                'admin_dashboard_eyebrow' => 'Kontrollzentrum',
                'admin_dashboard_title' => 'Projektbetrieb',
                'admin_dashboard_text' => 'Ein klarerer Arbeitsbereich, um Aktivitat, Serverzustand und wichtige Projektsignale auf einen Blick zu sehen.',
                'admin_metrics_title' => 'Live-Metriken',
                'admin_metrics_text' => 'Zentrale Konto- und Serverindikatoren aus der aktuellen Umgebung.',
                'admin_chart_title' => 'Monatliche Besuche',
                'admin_chart_text' => 'Schneller visueller Verlauf des aktuellen jahrlichen Traffic-Zyklus.',
            ),
            'ru' => array(
                'home_hero_kicker' => 'Open Source CMS dlya Intersect Engine',
                'home_default_lead' => 'Otkrytaya osnova dlya predstavleniya, rasshireniya i adaptatsii proektov, sozdannykh na Intersect Engine.',
                'home_default_feature_one_title' => 'Predstavlenie',
                'home_default_feature_one_text' => 'Bolee ponyatnaya i povtorno ispolzuemaya glavnaya stranitsa dlya proektov, kotorym nuzhen silnyy pervyy vpechatlenie.',
                'home_default_feature_two_title' => 'Gibkost',
                'home_default_feature_two_text' => 'Bloki, v kotorykh mozhno menyat teksty, tsveta i deystviya bez polnoy peresborki vsego vida.',
                'home_default_feature_three_title' => 'Soobshchestvo',
                'home_default_feature_three_text' => 'Mesto dlya novostey, zagruzok, paneley i poleznykh dannykh proekta bez privyazki CMS k odnomu tipu igry.',
                'home_support_title' => 'Sozdano dlya raznykh tipov proektov',
                'home_support_text' => 'Zadacha v tom, chtoby lyuboe soobshchestvo moglo bystro vzyat etu glavnuyu, legko nastroyt i sdelat svoey.',
                'home_story_title' => 'Open source, povtorno ispolzuemyy i prostoy v redaktirovanii',
                'home_story_text' => 'Eta glavnaya zadumana kak startovyy sloy: dostatochno stilya, chtoby vyglyadet sovremenno, i dostatochno gibkosti, chtoby podoyti mnogim proektam.',
                'home_story_card_one_eyebrow' => 'Aktivnost',
                'home_story_card_two_eyebrow' => 'Polzovateli',
                'home_story_card_three_eyebrow' => 'Vremya raboty',
                'home_final_title' => 'Luchshaya vizualnaya osnova dlya Intersect Engine CMS',
                'home_final_text' => 'Tselyu yavlyaetsya ne navyazat konkretnyy fantasy-setting, a dat sovremennyy i redaktiruemyy vhod dlya lyubogo proekta na Intersect Engine.',
                'site_footer_tagline' => 'Open source web-osnova dlya proektov na Intersect Engine.',
                'site_footer_description' => 'Sdelano tak, chtoby ego bylo prosto podderzhivat na GitHub i adaptirivat pod raznye soobshchestva.',
                'site_footer_explore' => 'Obzor',
                'site_footer_project' => 'Proekt',
                'site_footer_legal' => 'Pravo',
                'modal_login_text' => 'Voydite v svoj akkaunt CMS, chtoby upravlyat kontentom, polzovatelyami i nastroykami proekta.',
                'modal_register_text' => 'Sozdayte bazovyy akkaunt dlya proekta i nachnite adaptatsiyu CMS pod svoe soobshchestvo.',
                'modal_ticket_text' => 'Otkroyte tiket podderzhki, chtoby soobshchit o problemakh, poprosit pomoshch ili zafiksirovat zadachi proekta.',
                'ticket_type_ingame' => 'Problema v igre',
                'ticket_type_account' => 'Akkaunt',
                'ticket_type_billing' => 'Pokupki',
                'ticket_type_web' => 'Sait',
                'admin_sidebar_overview' => 'Obzor',
                'admin_sidebar_content' => 'Kontent',
                'admin_sidebar_world' => 'Mir',
                'admin_sidebar_community' => 'Soobshchestvo',
                'admin_sidebar_system' => 'Sistema',
                'admin_sidebar_back_to_site' => 'Nazad na sait',
                'admin_sidebar_source_code' => 'Ishodnyy kod',
                'admin_dashboard_eyebrow' => 'Panel upravleniya',
                'admin_dashboard_title' => 'Operatsii proekta',
                'admin_dashboard_text' => 'Bolee ponyatnaya rabochaya zona dlya prosmotra aktivnosti, sostoyaniya servera i klyuchevykh signalov proekta.',
                'admin_metrics_title' => 'Zhivye metriky',
                'admin_metrics_text' => 'Osnovnye pokazateli akkauntov i servera iz tekushchey sredy.',
                'admin_chart_title' => 'Mesyachnye vizity',
                'admin_chart_text' => 'Bystraya vizualnaya istoriya tekushchego godovogo tsikla trafika.',
            ),
            'zh' => array(
                'home_hero_kicker' => 'Intersect Engine de Open Source CMS',
                'home_default_lead' => 'Wei Intersect Engine xiangmu tigong yongyu zhanshi, kuozhan he shiying de kaifang yuanma jichu.',
                'home_default_feature_one_title' => 'Zhanshi',
                'home_default_feature_one_text' => 'Wei xuyao geng qiang shouci yinxiang de xiangmu tigong geng qingxi, geng yi fuyong de shouye.',
                'home_default_feature_two_title' => 'Shiyingxing',
                'home_default_feature_two_text' => 'Bujv keyi linghuo tihuan wenan, yanse he dongzuo, er bu yong mei ci dou chongzuo zhengti shijue.',
                'home_default_feature_three_title' => 'Shequ',
                'home_default_feature_three_text' => 'Wei xinwen, xiazai, yibiaopan he youyong de xiangmu shuju liu chu kongjian, tongshi bu ba CMS bang ding zai dan yi youxi leixing shang.',
                'home_support_title' => 'Wei bu tong leixing de xiangmu er sheji',
                'home_support_text' => 'Mubiao shi rang renhe shequ dou neng kuaisu fuyong zhege shouye, qingsong zidingyi bing rang ta chengwei ziji de menmian.',
                'home_story_title' => 'Open source, keyi fuyong, ye rongyi bianji',
                'home_story_text' => 'Zhege shouye shi yi ge qidian: you zuogou de pinpai gan, ye you zuogou de linghuoxing, keyi shiyong zai henduo xiangmu shang.',
                'home_story_card_one_eyebrow' => 'Huodong',
                'home_story_card_two_eyebrow' => 'Yonghu',
                'home_story_card_three_eyebrow' => 'Yunxing shijian',
                'home_final_title' => 'Wei Intersect Engine CMS dachu geng hao de shijue jichu',
                'home_final_text' => 'Mubiao bu shi qiangjia yi ge teding huanxiang fengge, er shi wei renhe Intersect Engine xiangmu tigong yige xiandai, keyi bianji de rukou.',
                'site_footer_tagline' => 'Mianxiang Intersect Engine xiangmu de open source web jichu.',
                'site_footer_description' => 'Bianyu zai GitHub shang weihu, ye neng qingsong shiying bu tong shequ.',
                'site_footer_explore' => 'Tansuo',
                'site_footer_project' => 'Xiangmu',
                'site_footer_legal' => 'Falv',
                'modal_login_text' => 'Denglu nin de CMS zhanghao yi guanli neirong, yonghu he xiangmu shezhi.',
                'modal_register_text' => 'Wei nin de xiangmu chuangjian jichu zhanghao, bing kaishi ba CMS tiaozheng wei ziji shequ de yangzi.',
                'modal_ticket_text' => 'Tijiao zhichi gongdan, yongyu baogao wenti, xunqiu bangzhu huo jilu xiangmu renwu.',
                'ticket_type_ingame' => 'Game neibu wenti',
                'ticket_type_account' => 'Zhanghao',
                'ticket_type_billing' => 'Goumai',
                'ticket_type_web' => 'Wangzhan',
                'admin_sidebar_overview' => 'Gaikuan',
                'admin_sidebar_content' => 'Neirong',
                'admin_sidebar_world' => 'Shijie',
                'admin_sidebar_community' => 'Shequ',
                'admin_sidebar_system' => 'Xitong',
                'admin_sidebar_back_to_site' => 'Hui dao wangzhan',
                'admin_sidebar_source_code' => 'Yuanma',
                'admin_dashboard_eyebrow' => 'Kongzhi mianban',
                'admin_dashboard_title' => 'Xiangmu yunying',
                'admin_dashboard_text' => 'Geng qingxi de gongzuo quyu, yonglai kuaisu chakan huodong, fuwuqi zhuangtai he guanjian xiangmu xinhao.',
                'admin_metrics_title' => 'Shishi zhibiao',
                'admin_metrics_text' => 'Lai zi dangqian huanjing de zhuyao zhanghao he fuwuqi zhibiao.',
                'admin_chart_title' => 'Yuedu fangwen',
                'admin_chart_text' => 'Dangqian niandu liuliang zhouqi de kuaisu shijue lishi.',
            ),
            'fr' => array(
                'home_hero_kicker' => 'CMS Open Source pour Intersect Engine',
                'home_default_lead' => 'Une base open source pour presenter, etendre et adapter des projets construits avec Intersect Engine.',
                'home_default_feature_one_title' => 'Presentation',
                'home_default_feature_one_text' => 'Une page d accueil plus claire et reutilisable pour les projets qui ont besoin d une presence publique plus forte des la premiere visite.',
                'home_default_feature_two_title' => 'Adaptabilite',
                'home_default_feature_two_text' => 'Des sections concues pour changer les textes, les couleurs et les actions sans reconstruire tout le style a chaque fois.',
                'home_default_feature_three_title' => 'Communaute',
                'home_default_feature_three_text' => 'De la place pour les news, les telechargements, les tableaux de bord et les donnees utiles sans enfermer le CMS dans un seul format de jeu.',
                'home_support_title' => 'Pense pour s adapter a differents projets',
                'home_support_text' => 'Le but est d offrir a chaque communaute une page d accueil reutilisable rapidement, facile a personnaliser et simple a s approprier.',
                'home_story_title' => 'Open source, reutilisable et facile a modifier',
                'home_story_text' => 'Cette page d accueil sert de point de depart: assez d identite pour paraitre actuelle, assez de souplesse pour rester utile a de nombreux projets.',
                'home_story_card_one_eyebrow' => 'Activite',
                'home_story_card_two_eyebrow' => 'Utilisateurs',
                'home_story_card_three_eyebrow' => 'Disponibilite',
                'home_final_title' => 'Une meilleure base visuelle pour Intersect Engine CMS',
                'home_final_text' => 'Le but n est pas d imposer un univers fantasy precis, mais de fournir une entree moderne et editable pour tout projet construit sur Intersect Engine.',
                'site_footer_tagline' => 'Base web open source pour les projets construits avec Intersect Engine.',
                'site_footer_description' => 'Concue pour etre maintenue sur GitHub et adaptee facilement a differentes communautes.',
                'site_footer_explore' => 'Explorer',
                'site_footer_project' => 'Projet',
                'site_footer_legal' => 'Legal',
                'modal_login_text' => 'Connectez-vous a votre compte CMS pour gerer le contenu, les utilisateurs et les reglages du projet.',
                'modal_register_text' => 'Creez un compte de base pour votre projet et commencez a adapter le CMS a votre propre communaute.',
                'modal_ticket_text' => 'Ouvrez un ticket de support pour signaler un probleme, demander de l aide ou documenter des taches du projet.',
                'ticket_type_ingame' => 'Probleme en jeu',
                'ticket_type_account' => 'Compte',
                'ticket_type_billing' => 'Achats',
                'ticket_type_web' => 'Site web',
                'admin_sidebar_overview' => 'Vue d ensemble',
                'admin_sidebar_content' => 'Contenu',
                'admin_sidebar_world' => 'Monde',
                'admin_sidebar_community' => 'Communaute',
                'admin_sidebar_system' => 'Systeme',
                'admin_sidebar_back_to_site' => 'Retour au site',
                'admin_sidebar_source_code' => 'Code source',
                'admin_dashboard_eyebrow' => 'Panneau de controle',
                'admin_dashboard_title' => 'Operations du projet',
                'admin_dashboard_text' => 'Un espace plus clair pour suivre l activite, l etat du serveur et les signaux essentiels du projet.',
                'admin_metrics_title' => 'Metriques en direct',
                'admin_metrics_text' => 'Indicateurs principaux des comptes et du serveur mis a jour depuis l environnement actuel.',
                'admin_chart_title' => 'Visites mensuelles',
                'admin_chart_text' => 'Historique visuel rapide du cycle annuel de trafic en cours.',
            ),
            'pt' => array(
                'home_hero_kicker' => 'CMS Open Source para Intersect Engine',
                'home_default_lead' => 'Uma base open source para apresentar, expandir e adaptar projetos criados com Intersect Engine.',
                'home_default_feature_one_title' => 'Apresentacao',
                'home_default_feature_one_text' => 'Uma home mais clara e reutilizavel para projetos que precisam de uma presenca publica mais forte desde a primeira visita.',
                'home_default_feature_two_title' => 'Adaptabilidade',
                'home_default_feature_two_text' => 'Secoes feitas para trocar textos, cores e acoes sem precisar reconstruir todo o visual a cada mudanca.',
                'home_default_feature_three_title' => 'Comunidade',
                'home_default_feature_three_text' => 'Espaco para noticias, downloads, paineis e dados uteis do projeto sem prender o CMS a um unico formato de jogo.',
                'home_support_title' => 'Pensado para se adaptar a diferentes projetos',
                'home_support_text' => 'A ideia e dar a qualquer comunidade uma home que possa ser reaproveitada rapido, personalizada com facilidade e assumida como propria.',
                'home_story_title' => 'Open source, reutilizavel e facil de editar',
                'home_story_text' => 'Esta home foi pensada como camada inicial: identidade suficiente para parecer atual e flexibilidade suficiente para servir a muitos projetos.',
                'home_story_card_one_eyebrow' => 'Atividade',
                'home_story_card_two_eyebrow' => 'Usuarios',
                'home_story_card_three_eyebrow' => 'Tempo ativo',
                'home_final_title' => 'Uma base visual melhor para o Intersect Engine CMS',
                'home_final_text' => 'O objetivo nao e impor um cenario especifico de fantasia, mas oferecer uma entrada moderna e editavel para qualquer projeto feito com Intersect Engine.',
                'site_footer_tagline' => 'Base web open source para projetos feitos com Intersect Engine.',
                'site_footer_description' => 'Feita para ser mantida no GitHub e adaptada com facilidade a diferentes comunidades.',
                'site_footer_explore' => 'Explorar',
                'site_footer_project' => 'Projeto',
                'site_footer_legal' => 'Legal',
                'modal_login_text' => 'Acesse sua conta do CMS para gerenciar conteudo, usuarios e configuracoes do projeto.',
                'modal_register_text' => 'Crie uma conta base para o seu projeto e comece a adaptar o CMS para a sua propria comunidade.',
                'modal_ticket_text' => 'Abra um ticket de suporte para reportar problemas, pedir ajuda ou registrar tarefas do projeto.',
                'ticket_type_ingame' => 'Erro no jogo',
                'ticket_type_account' => 'Conta',
                'ticket_type_billing' => 'Compras',
                'ticket_type_web' => 'Site',
                'admin_sidebar_overview' => 'Visao geral',
                'admin_sidebar_content' => 'Conteudo',
                'admin_sidebar_world' => 'Mundo',
                'admin_sidebar_community' => 'Comunidade',
                'admin_sidebar_system' => 'Sistema',
                'admin_sidebar_back_to_site' => 'Voltar ao site',
                'admin_sidebar_source_code' => 'Codigo fonte',
                'admin_dashboard_eyebrow' => 'Painel de controle',
                'admin_dashboard_title' => 'Operacoes do projeto',
                'admin_dashboard_text' => 'Um espaco mais claro para revisar atividade, estado do servidor e sinais importantes do projeto rapidamente.',
                'admin_metrics_title' => 'Metricas ao vivo',
                'admin_metrics_text' => 'Indicadores principais de contas e servidor atualizados a partir do ambiente atual.',
                'admin_chart_title' => 'Visitas mensais',
                'admin_chart_text' => 'Historico visual rapido do ciclo anual de trafego atual.',
            ),
            'hi' => array(
                'home_hero_kicker' => 'Intersect Engine ke liye Open Source CMS',
                'home_default_lead' => 'Intersect Engine par bane projects ko dikhane, badhane aur apne hisab se dhalne ke liye ek open source base.',
                'home_default_feature_one_title' => 'Prastuti',
                'home_default_feature_one_text' => 'Un projects ke liye zyada saaf aur dobara istemal hone wali home jo pehli visit se hi mazboot impression de.',
                'home_default_feature_two_title' => 'Lachilapan',
                'home_default_feature_two_text' => 'Aise sections jahan text, rang aur actions badle ja sakte hain bina poora visual dobara banaye.',
                'home_default_feature_three_title' => 'Samuday',
                'home_default_feature_three_text' => 'News, downloads, dashboards aur kaam ki project jankari ke liye jagah, bina CMS ko sirf ek game format tak simit kiye.',
                'home_support_title' => 'Alag alag projects ke liye banaya gaya',
                'home_support_text' => 'Maqsad hai ki koi bhi community is homepage ko jaldi reuse kar sake, asani se customize kar sake aur ise apna bana sake.',
                'home_story_title' => 'Open source, reusable aur edit karne me asan',
                'home_story_text' => 'Ye homepage ek starting layer ke roop me socha gaya hai: itni pehchan ki modern lage aur itni flexibility ki kai projects me kaam aaye.',
                'home_story_card_one_eyebrow' => 'Gatividhi',
                'home_story_card_two_eyebrow' => 'Users',
                'home_story_card_three_eyebrow' => 'Chalne ka samay',
                'home_final_title' => 'Intersect Engine CMS ke liye ek behtar visual base',
                'home_final_text' => 'Maqsad kisi ek fantasy setting ko thopna nahi, balki Intersect Engine par bane har project ke liye ek modern aur editable entry dena hai.',
                'site_footer_tagline' => 'Intersect Engine projects ke liye open source web base.',
                'site_footer_description' => 'GitHub par maintain karne aur alag alag communities ke liye asani se adapt karne ke liye banaya gaya.',
                'site_footer_explore' => 'Explore',
                'site_footer_project' => 'Project',
                'site_footer_legal' => 'Legal',
                'modal_login_text' => 'Content, users aur project settings ko manage karne ke liye apne CMS account me login karein.',
                'modal_register_text' => 'Apne project ke liye ek base account banayein aur CMS ko apni community ke hisab se dhalna shuru karein.',
                'modal_ticket_text' => 'Problem report karne, madad mangne ya project tasks note karne ke liye support ticket kholen.',
                'ticket_type_ingame' => 'In-game issue',
                'ticket_type_account' => 'Account',
                'ticket_type_billing' => 'Purchases',
                'ticket_type_web' => 'Website',
                'admin_sidebar_overview' => 'Overview',
                'admin_sidebar_content' => 'Content',
                'admin_sidebar_world' => 'World',
                'admin_sidebar_community' => 'Community',
                'admin_sidebar_system' => 'System',
                'admin_sidebar_back_to_site' => 'Back to site',
                'admin_sidebar_source_code' => 'Source code',
                'admin_dashboard_eyebrow' => 'Control panel',
                'admin_dashboard_title' => 'Project operations',
                'admin_dashboard_text' => 'A clearer workspace for reviewing activity, server state and key project signals at a glance.',
                'admin_metrics_title' => 'Live metrics',
                'admin_metrics_text' => 'Core account and server indicators updated from the current environment.',
                'admin_chart_title' => 'Monthly visits',
                'admin_chart_text' => 'Quick visual history for the current yearly traffic cycle.',
            ),
            'ar' => array(
                'home_hero_kicker' => 'Open Source CMS li Intersect Engine',
                'home_default_lead' => 'Qaedah مفتوحة المصدر li ard, tawsi, wa tatbiq mashari a mabniya ala Intersect Engine.',
                'home_default_feature_one_title' => 'Ard',
                'home_default_feature_one_text' => 'Safha ra isiya awdah wa qabila lil iada li mashari tahtaaj ila huzur aam aqwa min awal ziyara.',
                'home_default_feature_two_title' => 'Muruna',
                'home_default_feature_two_text' => 'Aqsam tusahil taghyir al nusus wal alwan wal ijraat bidun iadat bina al huliya kull marra.',
                'home_default_feature_three_title' => 'Mujtama',
                'home_default_feature_three_text' => 'Masaha lil akhbar wal tahmilat wal lawahat wal bayanat al mufida bidun rabt al CMS binaw in laab wahid.',
                'home_support_title' => 'Musammam liyunasib anwa mukhtalifa min al mashari',
                'home_support_text' => 'Al hadaf huwa an tastati ay mujtama an yaid istikhdam hadhihi al safha bisura saria, wa yukhassisaha bisuhula, wa yajaalaha laha.',
                'home_story_title' => 'Open source, qabil li iadat al istikhdam, wa sahl al tahrir',
                'home_story_text' => 'Hadhihi al safha tumaththil bidaya: kadar kaf min al hawiya lituzihr haditha, wa kadar kaf min al muruna litabqa nafia lima shari kathira.',
                'home_story_card_one_eyebrow' => 'Nashat',
                'home_story_card_two_eyebrow' => 'Users',
                'home_story_card_three_eyebrow' => 'Waqt al amal',
                'home_final_title' => 'Qaedah basariya afdal li Intersect Engine CMS',
                'home_final_text' => 'Al maqsad laysa farz jaw fantasy muhaddad, bal taqdim madkhal hadith wa qabil lil tahrir li ay mashru mabni ala Intersect Engine.',
                'site_footer_tagline' => 'Qaedah web open source li mashari Intersect Engine.',
                'site_footer_description' => 'Musammama litusyana ala GitHub wa litatakkayaf bisuhula ma mujtam at mukhtalifa.',
                'site_footer_explore' => 'Istikshaf',
                'site_footer_project' => 'Mashru',
                'site_footer_legal' => 'Qanuni',
                'modal_login_text' => 'Udkhul ila حساب CMS li idarat al muhtawa wal users wa iidadat al mashru.',
                'modal_register_text' => 'Anshi حساب asasi li mashruik wabda taqyif al CMS ma mujtamaik.',
                'modal_ticket_text' => 'Iftah tadhkara daam lil iblagh an al mushkilat aw talab al musaada aw tawthiq maham al mashru.',
                'ticket_type_ingame' => 'Mushkila dakhil al laaba',
                'ticket_type_account' => 'Hisab',
                'ticket_type_billing' => 'Mushtarayat',
                'ticket_type_web' => 'Mawqi',
                'admin_sidebar_overview' => 'Nazra amma',
                'admin_sidebar_content' => 'Muhtawa',
                'admin_sidebar_world' => 'Alam',
                'admin_sidebar_community' => 'Mujtama',
                'admin_sidebar_system' => 'Nizam',
                'admin_sidebar_back_to_site' => 'Al awda ila al mawqi',
                'admin_sidebar_source_code' => 'Al masdar',
                'admin_dashboard_eyebrow' => 'Lawhat tahakkum',
                'admin_dashboard_title' => 'Amaliyyat al mashru',
                'admin_dashboard_text' => 'Masaha awdah limurajaat al nashat wa halat al khadim wa ahamm isharaat al mashru bisura saria.',
                'admin_metrics_title' => 'Muashirat mubashara',
                'admin_metrics_text' => 'Ahamm muashirat al hisabat wal khadim min al biah al halia.',
                'admin_chart_title' => 'Al ziyarat al shahria',
                'admin_chart_text' => 'Nazra basariya saria ala dawrat al murur al sanawiya al halia.',
            ),
        );

        if ($lang === 'en') {
            return $default;
        }

        return array_merge($default, isset($translations[$lang]) ? $translations[$lang] : array());
    }

    private function refreshVisits(array $configRow, array $visitsRow)
    {
        $month = date('M');

        if ($month === 'Jan' || (isset($visitsRow['december']) && (int) $visitsRow['december'] < 0)) {
            $resetData = array(
                'january' => 0,
                'february' => 0,
                'march' => 0,
                'april' => 0,
                'may' => 0,
                'june' => 0,
                'july' => 0,
                'august' => 0,
                'september' => 0,
                'october' => 0,
                'november' => 0,
                'december' => 0,
            );
            $this->db->where('id', 1);
            $this->db->update('visits', $resetData);
            $visitsRow = array_merge($visitsRow, $resetData);
        }

        if ($this->session->userdata('rol') == 2 || $this->session->userdata('login') == false) {
            $monthMap = array(
                'Jan' => 'january',
                'Feb' => 'february',
                'Mar' => 'march',
                'Apr' => 'april',
                'May' => 'may',
                'Jun' => 'june',
                'Jul' => 'july',
                'Aug' => 'august',
                'Sep' => 'september',
                'Oct' => 'october',
                'Nov' => 'november',
                'Dec' => 'december',
            );

            if (isset($monthMap[$month])) {
                $column = $monthMap[$month];
                $currentValue = isset($visitsRow[$column]) ? (int) $visitsRow[$column] : 0;
                $visitsRow[$column] = $currentValue + 1;
                $this->db->where('id', 1);
                $this->db->update('visits', array($column => $visitsRow[$column]));
            }
        }

        return $visitsRow;
    }

    private function getSharedData()
    {
        $configRow = $this->getConfigRow();

        if ($this->session->userdata('lang') == '') {
            $this->session->set_userdata(array(
                'lang' => $configRow['lang'] ?? 'es',
            ));
        }

        $visitsRow = $this->refreshVisits($configRow, $this->getVisitsRow());

        $this->load->model('Apiserverinfo');
        $serverInfo = (array) $this->Apiserverinfo->serverinfo();
        $sessionLang = $this->session->userdata('lang') ?: ($configRow['lang'] ?? 'es');
        $rebrandText = $this->getRebrandTextData($sessionLang);

        return array_merge(array(
            'site_lang' => $sessionLang,
            'site_title' => $serverInfo['GameName'] ?? 'Intersect CMS',
            'analytics_id' => $configRow['analytics'] ?? '',
            'theme_color1' => $configRow['color1'] ?? '#2d5474',
            'theme_color2' => $configRow['color2'] ?? '#107e72',
            'download_url' => $configRow['download'] ?? '',
            'current_user' => $this->session->userdata('user') ?: '',
            'is_logged_in' => $this->session->userdata('login') ? 1 : 0,
            'is_admin' => ((int) $this->session->userdata('rol') === 1) ? 1 : 0,
            'current_year' => date('Y'),
            'tinymce_language' => $this->getTinymceLanguage($sessionLang),
            'visits_january' => (int) ($visitsRow['january'] ?? 0),
            'visits_february' => (int) ($visitsRow['february'] ?? 0),
            'visits_march' => (int) ($visitsRow['march'] ?? 0),
            'visits_april' => (int) ($visitsRow['april'] ?? 0),
            'visits_may' => (int) ($visitsRow['may'] ?? 0),
            'visits_june' => (int) ($visitsRow['june'] ?? 0),
            'visits_july' => (int) ($visitsRow['july'] ?? 0),
            'visits_august' => (int) ($visitsRow['august'] ?? 0),
            'visits_september' => (int) ($visitsRow['september'] ?? 0),
            'visits_october' => (int) ($visitsRow['october'] ?? 0),
            'visits_november' => (int) ($visitsRow['november'] ?? 0),
            'visits_december' => (int) ($visitsRow['december'] ?? 0),
        ), $rebrandText);
    }

    public function lang(){
        $es = array(
            ////////////////////////////////////////////Home////////////////////////////////////////////////////////
            'downloadbutton' => 'Download',
            'onlineplayers' => 'Personajes Online',
            'listusers' => 'Listado Usuarios',
            'listplayers' => 'Listado Personajes',
            'shop' => 'Tienda',
            'news' => 'News',
            'register' => 'Registro',
            'password' => 'Contraseña',
            'confirmpassword' => 'Confirmar Contraseña',
            'email' => 'Correo',
            'forgotpassword' => 'Se Olvido de su Contraseña?',
            'login' => 'Login',
            'statistics' => 'Estadisticas',
            'onlinetime' => 'Tiempo Online',
            'useronline' => 'Usuarios Online',
            'usersregistered' => 'Usuarios Registrados',
            'features' => 'Caracteristicas',
            'copyright' => 'Copyright',
            'legalnotice' => 'Legal Notice',
            'terms' => 'Terms and Conditions',
            'privacity' => 'Privacity',
            'disconnect' => 'Desconectarse',
            'administrativepanel' => 'Panel Administrativo',
            'name' => 'Nombre',
            'language' => 'Idioma',
            ////////////////////////////////////////////Players Online////////////////////////////////////////////////////////
            'class' => 'Clase',
            'gender' => 'Genero',
            'exp' => 'Experiencia',
            'map' => 'Mapa',
            ////////////////////////////////////////////Users////////////////////////////////////////////////////////
            'timeplayed' => 'Tiempo Jugado',
            'banned' => 'Baneado',
            'muted' => 'Muteado',
            ////////////////////////////////////////////Players////////////////////////////////////////////////////////
            'level' => 'Nivel',
            'status' => 'Estado',
            ////////////////////////////////////////////Shop////////////////////////////////////////////////////////
            'productdetail' => 'Detalles del Producto',
            'atackan' => 'Animación de Ataque',
            'interacan' => 'Animación de Interacción',
            'return' => 'Volver',
            'buy' => 'Comprar',
            'paymentmethod' => 'Metodo de Pago',
            ////////////////////////////////////////////News////////////////////////////////////////////////////////
            'lastnews' => 'Ultimas Noticias',
            'writedby' => 'Escrito Por',
            ////////////////////////////////////////////Mant////////////////////////////////////////////////////////
            'maintenance' => 'Mantenimiento',
            'maintenancemessage' => 'Buenas estamos en Mantenimiento. Pronto Volveremos',
            'maintenanceenter' => 'Entrar como Admin',
            'enter' => 'Entrar',
            'user' => 'Usuario',
            /////////////////////////////////////////////Recover////////////////////////////////////////////////////
            'recoverpassword' => 'Recuperar Contraseña',
            'recover' => 'Recuperar',
            ////////////////////////////////////////////Dashboard///////////////////////////////////////////////////
            'totalplayers' => 'Personajes Totales',
            'cps' => 'CPS Server',
            'directmessage' => 'Mensaje Directo',
            'userorplayer' => 'Usuario o Personaje',
            'message' => 'Mensaje',
            'mapmessage' => 'Mensaje a Mapa',
            'mapid' => 'ID Mapa',
            'globalmessage' => 'Mensaje Global',
            'consolecommand' => 'Comando Consola',
            'command' => 'Comando',
            'ban' => 'Banear',
            'reason' => 'Razon',
            'duration' => 'Duracion (Dias)',
            'mute' => 'Mutear',
            'unban' => 'Desbanear',
            'unmute' => 'Desmutear',
            'teleport' => 'Teletransportar',
            'kickuser' => 'Kick User',
            'Kill' => 'Asesinar',
            ////////////////////////////////////////////Sidebar/////////////////////////////////////////////////////
            'home' => 'Inicio',
            'dashboard' => 'Dashboard',
            'objects' => 'Objetos',
            'events' => 'Eventos',
            'quests' => 'Misiones',
            'logs' => 'Logs',
            'adminaccounts' => 'Cuentas',
            'config' => 'Configuración',
            'maps' => 'Mapas',
            ///////////////////////////////////////Shop Admin/////////////////////////////////////////////////////
            'price' => 'Precio',
            'products' => 'Productos',
            'description' => 'Descripción',
            'action' => 'Acción',
            'productpic' => 'Foto del Producto',
            'addproduct' => 'Añadir Producto',
            'editproduct' => 'Editar Producto',
            'edit' => 'Editar',
            /////////////////////////////////////News Admin//////////////////////////////////////////////////////
            'addnews' => 'Crear Nueva Noticia',
            'title' => 'Titulo',
            'textnews' => 'Texto de la Noticia',
            'newspic' => 'Foto de la Noticia',
            'uploadnews' => 'Subir Noticia',
            'date' => 'Fecha',
            ////////////////////////////////////Objects Admin////////////////////////////////////////////////////
            'key' => 'Key',
            ///////////////////////////////////////Logs/////////////////////////////////////////////////////////
            'admin' => 'Administrador',
            'logs' => 'Logs',
            //////////////////////////////////////Admin Accounts////////////////////////////////////////////////
            'addadminaccount' => 'Crear Cuenta',
            /////////////////////////////////////Config/////////////////////////////////////////////////////////
            'gradient' => 'Colores Gradiente',
            'analytics' => 'Google Analytics',
            'configdownloadbutton' => 'Boton de Descarga',
            'activate' => 'Activar',
            'deactivate' => 'Desactivar',
            'changelegal' => 'Cambiar Legal',
            'changeterms' => 'Cambiar Terminos',
            'changeprivacity' => 'Cambiar Privacidad',
            'editmenus' => 'Editar Menus',
            'change' => 'Cambiar',
            /////////////////////////////////////Edit Legal////////////////////////////////////////////////////
            'editlegal' => 'Editar Legal',
            'textlegal' => 'Texto Legal',
            ////////////////////////////////////Edit Terms////////////////////////////////////////////////////
            'editterms' => 'Editar Terminos y Condiciones',
            'textterms' => 'Texto Terminos y Condiciones',
            ///////////////////////////////////Edit Privacity////////////////////////////////////////////////
            'editprivacity' => 'Editar Privacidad',
            'textprivacity' => 'Texto Privacidad',
            ////////////////////////////////////Edit Menus//////////////////////////////////////////////////
            'iconlist' => 'Listado Iconos',
            'descriptionmenu' => 'Descripcion del Menu',
            'iconmenu1' => 'Icono Menu 1',
            'iconmenu2' => 'Icono Menu 2',
            'iconmenu3' => 'Icono Menu 3',
            'titlemenu1' => 'Titulo Menu 1',
            'titlemenu2' => 'Titulo Menu 2',
            'titlemenu2' => 'Titulo Menu 3',
            'textmenu1' => 'Texto Menu 1',
            'textmenu2' => 'Texto Menu 2',
            'textmenu3' => 'Texto Menu 3',
            /////////////////////////////////Edit Lang////////////////////////////////////////////////////
            'editlang' => 'Editar Idioma',
            'chooselang' => 'Escoja el Idioma',
            ////////////////////////////////Data Tables/////////////////////////////////////////////////
            'search' => 'Buscar',
            'emptyTable' => 'No hay información',
            'infotable' => 'Mostrando _START_ a _END_ de _TOTAL_ Entradas',
            'infoEmpty' => 'Mostrando 0 to 0 of 0 Entradas',
            'infoFiltered' => '(Filtrado de _MAX_ total entradas)',
            'lengthMenu' => 'Mostrar _MENU_ Entradas',
            'loadingRecords' => 'Cargando...',
            'processing' => 'Procesando...',
            'zeroRecords' => 'Sin resultados encontrados',
            'first' => 'Primero',
            'last' => 'Ultimo',
            'next' => 'Siguiente',
            'previous' => 'Anterior',
            /////////////////////////////////Panel User///////////////////////////////////////////////////
            'paneluser' => 'Panel de Usuario',
            'recharge' => 'Recargar',
            'reset' => 'Resetear',
            'player' => 'Personaje',
            'createticket' => 'Crear Ticket',
            'tickettext' => 'Texto del Ticket',
            'addticket' => 'Enviar Ticket',
            'chooseticket' => 'Elegir Tipo de Ticket',
            'feedback' => 'Feedback',
            'tickets' => 'Tickets',
            'available' => 'Disponible',
            'updates' => 'Updates',
            'about' => 'About',
            'balanceavailable' => 'Saldo Disponible',
            'confirmnewpassword' => 'Confirmar Nueva Contraseña',
            'newpassword' => 'Nueva Contraseña',
            'oldpassword' => 'Contraseña Actual',
            'browser' => 'Navegador',
            'changepassword' => 'Cambiar Contraseña',
            'rechargeok' => 'Pago Completado Con Exito',
            ///////////////////////////////////0.7//////////////////////////////////////////////////////
            'commands' => 'Comandos',
            'hdd' => 'HDD',
            'cpu' => 'CPU',
            'ram' => 'RAM',
            'version' => 'Versión Local',
            'id' => 'ID',
            ////////////////////////////////////0.8////////////////////////////////////////////////////
           'changelog' => 'Changelog',
           'addchangelog' => 'Crear Changelog',
           );













           $en = array(
            ////////////////////////////////////////////Home////////////////////////////////////////////////////////
            'downloadbutton' => 'Download',
            'onlineplayers' => 'Online Players',
            'listusers' => 'List Users',
            'listplayers' => 'List Players',
            'shop' => 'Shop',
            'news' => 'News',
            'register' => 'Register',
            'password' => 'Password',
            'confirmpassword' => 'Confirm Password',
            'email' => 'Email',
            'forgotpassword' => 'You Forgotten your Password?',
            'login' => 'Login',
            'statistics' => 'Statistics',
            'onlinetime' => 'Online Time',
            'useronline' => 'Users Online',
            'usersregistered' => 'Users Registered',
            'features' => 'Features',
            'copyright' => 'Copyright',
            'legalnotice' => 'Legal Notice',
            'terms' => 'Terms and Conditions',
            'privacity' => 'Privacity',
            'disconnect' => 'Disconnect',
            'administrativepanel' => 'Administrative Panel',
            'name' => 'Name',
            'language' => 'Language',
            ////////////////////////////////////////////Players Online////////////////////////////////////////////////////////
            'class' => 'Class',
            'gender' => 'Gender',
            'exp' => 'Experiencie',
            'map' => 'Map',
            ////////////////////////////////////////////Users////////////////////////////////////////////////////////
            'timeplayed' => 'Time Played',
            'banned' => 'Banned',
            'muted' => 'Muted',
            ////////////////////////////////////////////Players////////////////////////////////////////////////////////
            'level' => 'Level',
            'status' => 'Status',
            ////////////////////////////////////////////Shop////////////////////////////////////////////////////////
            'productdetail' => 'Product Details',
            'atackan' => 'Attack Animation',
            'interacan' => 'Interaction Animation',
            'return' => 'Return',
            'buy' => 'Buy',
            'paymentmethod' => 'Payment Method',
            ////////////////////////////////////////////News////////////////////////////////////////////////////////
            'lastnews' => 'Last News',
            'writedby' => 'Written By',
            ////////////////////////////////////////////Mant////////////////////////////////////////////////////////
            'maintenance' => 'Maintenance',
            'maintenancemessage' => 'Hello, we are in Maintenance. Soon we will be back',
            'maintenanceenter' => 'Login as Admin',
            'enter' => 'Login',
            'user' => 'User',
            /////////////////////////////////////////////Recover////////////////////////////////////////////////////
            'recoverpassword' => 'Recover Password',
            'recover' => 'Recover',
            ////////////////////////////////////////////Dashboard///////////////////////////////////////////////////
            'totalplayers' => 'Total Players',
            'cps' => 'CPS Server',
            'directmessage' => 'Direct Message',
            'userorplayer' => 'User or Plater',
            'message' => 'Message',
            'mapmessage' => 'Map Message',
            'mapid' => 'Map ID',
            'globalmessage' => 'Global Message',
            'consolecommand' => 'Console Command',
            'command' => 'Command',
            'ban' => 'Ban',
            'reason' => 'Reason',
            'duration' => 'Duration (Days)',
            'mute' => 'Mute',
            'unban' => 'Unban',
            'unmute' => 'Unmute',
            'teleport' => 'Teleport',
            'kickuser' => 'Kick User',
            'Kill' => 'Kill',
            ////////////////////////////////////////////Sidebar/////////////////////////////////////////////////////
            'home' => 'Home',
            'dashboard' => 'Dashboard',
            'objects' => 'Objects',
            'events' => 'Events',
            'quests' => 'Quests',
            'logs' => 'Logs',
            'adminaccounts' => 'Admin Accounts',
            'config' => 'Config',
            'maps' => 'Maps',
            ///////////////////////////////////////Shop Admin/////////////////////////////////////////////////////
            'price' => 'Price',
            'products' => 'Products',
            'description' => 'Description',
            'action' => 'Action',
            'productpic' => 'Product Pic',
            'addproduct' => 'Add Product',
            'editproduct' => 'Edit Product',
            'edit' => 'Edit',
            /////////////////////////////////////News Admin//////////////////////////////////////////////////////
            'addnews' => 'Add News',
            'title' => 'Title',
            'textnews' => 'Text News',
            'newspic' => 'News Pic',
            'uploadnews' => 'Upload News',
            'date' => 'Date',
            ////////////////////////////////////Objects Admin////////////////////////////////////////////////////
            'key' => 'Key',
            ///////////////////////////////////////Logs/////////////////////////////////////////////////////////
            'admin' => 'Administrator',
            'logs' => 'Logs',
            //////////////////////////////////////Admin Accounts////////////////////////////////////////////////
            'addadminaccount' => 'Add Admin Account',
            /////////////////////////////////////Config/////////////////////////////////////////////////////////
            'gradient' => 'Gradient Colors',
            'analytics' => 'Google Analytics',
            'configdownloadbutton' => 'Download Button',
            'activate' => 'Activate',
            'deactivate' => 'Deactivate',
            'changelegal' => 'Change Legal',
            'changeterms' => 'Change Terms',
            'changeprivacity' => 'Change Privacity',
            'editmenus' => 'Edit Menus',
            'change' => 'Change',
            /////////////////////////////////////Edit Legal////////////////////////////////////////////////////
            'editlegal' => 'Edit Legal',
            'textlegal' => 'Text Legal',
            ////////////////////////////////////Edit Terms////////////////////////////////////////////////////
            'editterms' => 'Edit Terms and Conditions',
            'textterms' => 'Text Terms and Conditions',
            ///////////////////////////////////Edit Privacity////////////////////////////////////////////////
            'editprivacity' => 'Edit Privacity',
            'textprivacity' => 'Text Privacity',
            ////////////////////////////////////Edit Menus//////////////////////////////////////////////////
            'iconlist' => 'Icon List',
            'descriptionmenu' => 'Description of the Menu',
            'iconmenu1' => 'Icon Menu 1',
            'iconmenu2' => 'Icon Menu 2',
            'iconmenu3' => 'Icon Menu 3',
            'titlemenu1' => 'Title Menu 1',
            'titlemenu2' => 'Title Menu 2',
            'titlemenu2' => 'Title Menu 3',
            'textmenu1' => 'Text Menu 1',
            'textmenu2' => 'Text Menu 2',
            'textmenu3' => 'Text Menu 3',
            /////////////////////////////////Edit Lang////////////////////////////////////////////////////
            'editlang' => 'Edit Language',
            'chooselang' => 'Choose Language',
            ////////////////////////////////Data Tables/////////////////////////////////////////////////
            'search' => 'Search',
            'emptyTable' => 'There is no information',
            'infotable' => 'Showing _START_ to _END_ of _TOTAL_ Entries',
            'infoEmpty' => 'Showing 0 to 0 of 0 Entries',
            'infoFiltered' => '(Filtering of _MAX_ total entries)',
            'lengthMenu' => 'Show _MENU_ Entries',
            'loadingRecords' => 'Loading...',
            'processing' => 'Processing...',
            'zeroRecords' => 'No results found',
            'first' => 'First',
            'last' => 'Last',
            'next' => 'Next',
            'previous' => 'Previous',
            /////////////////////////////////Panel User///////////////////////////////////////////////////
            'paneluser' => 'User Panel',
            'recharge' => 'Recharge',
            'reset' => 'Reset',
            'player' => 'Player',
            'createticket' => 'Create Ticket',
            'tickettext' => 'Ticket Text',
            'addticket' => 'Submit Ticket',
            'chooseticket' => 'Choose Type of Ticket',
            'feedback' => 'Feedback',
            'tickets' => 'Tickets',
            'available' => 'Available',
            'updates' => 'Updates',
            'about' => 'About',
            'balanceavailable' => 'Available Balance',
            'confirmnewpassword' => 'Confirm New Password',
            'newpassword' => 'New Password',
            'oldpassword' => 'Current password',
            'browser' => 'Browser',
            'changepassword' => 'Change Password',
            'rechargeok' => 'Payment Completed Successfully',
            ///////////////////////////////////0.7//////////////////////////////////////////////////////
            'commands' => 'Commands',
            'hdd' => 'HDD',
            'cpu' => 'CPU',
            'ram' => 'RAM',
            'version' => 'Local Version',
            'id' => 'ID',
            ////////////////////////////////////0.8////////////////////////////////////////////////////
            'changelog' => 'Changelog',
            'addchangelog' => 'Create Changelog',
        );

























$tr = array(
            ////////////////////////////////////////////Home////////////////////////////////////////////////////////
            'downloadbutton' => 'İndir',
            'onlineplayers' => 'Çevrimiçi Oyuncular',
            'listusers' => 'Kullanıcı Listesi',
            'listplayers' => 'Oyuncu Listesi',
            'shop' => 'Market',
            'news' => 'Haberler',
            'register' => 'Kayıt',
            'password' => 'Şifre',
            'confirmpassword' => 'Şifreyi Onayla',
            'email' => 'Mail Adresi',
            'forgotpassword' => 'Parolanızı mı unuttunuz?',
            'login' => 'Giriş',
            'statistics' => 'İstatistikler',
            'onlinetime' => 'Çevrimiçi Zaman',
            'useronline' => 'Çevrimiçi Oyuncular',
            'usersregistered' => 'Kayıtlı Kullanıcılar',
            'features' => 'Özellikler',
            'copyright' => 'Telif Hakkı',
            'legalnotice' => 'Yasal Uyarı',
            'terms' => 'Şartlar ve Koşullar',
            'privacity' => 'Gizlilik',
            'disconnect' => 'Oturumu Kapat',
            'administrativepanel' => 'Yönetici Paneli',
            'name' => 'İsim',
            'language' => 'Dil',
            ////////////////////////////////////////////Players Online////////////////////////////////////////////////////////
            'class' => 'Sınıf',
            'gender' => 'Cinsiyet',
            'exp' => 'Tecrübe Puanı',
            'map' => 'Harita',
            ////////////////////////////////////////////Users////////////////////////////////////////////////////////
            'timeplayed' => 'Oynama Süresi',
            'banned' => 'Banlı',
            'muted' => 'Susturulmuş',
            ////////////////////////////////////////////Players////////////////////////////////////////////////////////
            'level' => 'Seviye',
            'status' => 'Durum',
            ////////////////////////////////////////////Shop////////////////////////////////////////////////////////
            'productdetail' => 'Ürün Detayları',
            'atackan' => 'Saldırı Animasyonu',
            'interacan' => 'Etkileşim Animasyonu',
            'return' => 'Geri Dön',
            'buy' => 'Satın Al',
            'paymentmethod' => 'Ödeme Yöntemi',
            ////////////////////////////////////////////News////////////////////////////////////////////////////////
            'lastnews' => 'Son Haberler',
            'writedby' => 'tarafından yazılmıştır',
            ////////////////////////////////////////////News////////////////////////////////////////////////////////
            'maintenance' => 'Bakım & Onarım',
            'maintenancemessage' => 'Merhaba, Bakımdayız. Yakında geri döneceğiz',
            'maintenanceenter' => 'Yönetici olarak giriş yapın',
            'enter' => 'Giriş',
            'user' => 'Kullanıcı',
            /////////////////////////////////////////////Recover////////////////////////////////////////////////////
            'recoverpassword' => 'Şifre Kurtarma',
            'recover' => 'Geri Al',
            ////////////////////////////////////////////Dashboard///////////////////////////////////////////////////
            'totalplayers' => 'Toplam Oyuncu',
            'cps' => 'CPS Sunucusu',
            'directmessage' => 'Direk Mesaj',
            'userorplayer' => 'Kullanıcı veya Karakter',
            'message' => 'Mesaj',
            'mapmessage' => 'Haritaya Mesaj',
            'mapid' => 'Harita ID',
            'globalmessage' => 'Küresel Mesaj',
            'consolecommand' => 'Konsol Komutu',
            'command' => 'Komut',
            'ban' => 'Yasaklama',
            'reason' => 'Sebep',
            'duration' => 'Süre (Gün)',
            'mute' => 'Susturma',
            'unban' => 'Yasaklama Kaldırma',
            'unmute' => 'Susturma Kaldırma',
            'teleport' => 'Işınlanma',
            'kickuser' => 'Kullanıcıyı At',
            'Kill' => 'Öldür',
            ////////////////////////////////////////////Sidebar/////////////////////////////////////////////////////
            'home' => 'Başlangıç',
            'dashboard' => 'Gösterge Paneli',
            'objects' => 'Nesneler',
            'events' => 'Etkinlikler',
            'quests' => 'Görevler',
            'logs' => 'Kayıtlar',
            'adminaccounts' => 'Yönetici Hesapları',
            'config' => 'Ayarlar',
            'maps' => 'Mapler',
            ///////////////////////////////////////Shop Admin/////////////////////////////////////////////////////
            'price' => 'Fiyat',
            'products' => 'Ürünler',
            'description' => 'Açıklama',
            'action' => 'Eylem',
            'productpic' => 'Ürün Fotoğrafı',
            'addproduct' => 'Ürün Ekle',
            'editproduct' => 'Ürün Düzenle',
            'edit' => 'Düzenle',
            /////////////////////////////////////News Admin//////////////////////////////////////////////////////
            'addnews' => 'Yeni Haber Oluştur',
            'title' => 'Başlık',
            'textnews' => 'Haber Metni',
            'newspic' => 'Haber Fotoğrafı',
            'uploadnews' => 'Haber Yükle',
            'date' => 'Tarih',
            ////////////////////////////////////Objects Admin////////////////////////////////////////////////////
            'key' => 'Anahtar',
            ///////////////////////////////////////Logs/////////////////////////////////////////////////////////
            'admin' => 'Yönetici',
            'logs' => 'Kayıtlar',
            //////////////////////////////////////Admin Accounts////////////////////////////////////////////////
            'addadminaccount' => 'Yönetici Hesabı Ekle',
            /////////////////////////////////////Config/////////////////////////////////////////////////////////
            'gradient' => 'Gradyan Renkleri',
            'analytics' => 'Google Analytics',
            'configdownloadbutton' => 'İndirme Butonu',
            'activate' => 'Etkinleştir',
            'deactivate' => 'Devre Dışı Bırak',
            'changelegal' => 'Yasalı Değiştir',
            'changeterms' => 'Şartları Değiştir',
            'changeprivacity' => 'Gizliliği Değiştir',
            'editmenus' => 'Menüleri Düzenle',
            'change' => 'Değiştir',
            /////////////////////////////////////Edit Legal////////////////////////////////////////////////////
            'editlegal' => 'Yasalı Düzenle',
            'textlegal' => 'Yasal Metni',
            ////////////////////////////////////Edit Terms////////////////////////////////////////////////////
            'editterms' => 'Koşulları ve Şartları Düzenle',
            'textterms' => 'Koşullar ve Şartlar Metni',
            ///////////////////////////////////Edit Privacity////////////////////////////////////////////////
            'editprivacity' => 'Gizliliği Düzenle',
            'textprivacity' => 'Gizlilik Metni',
            ////////////////////////////////////Edit Menus//////////////////////////////////////////////////
            'iconlist' => 'Simge Listesi',
            'descriptionmenu' => 'Açıklama Menüsü',
            'iconmenu1' => 'Simge Menüsü 1',
            'iconmenu2' => 'Simge Menüsü 2',
            'iconmenu3' => 'Simge Menüsü 3',
            'titlemenu1' => 'Başlık Menüsü 1',
            'titlemenu2' => 'Başlık Menüsü 2',
            'titlemenu2' => 'Başlık Menüsü 3',
            'textmenu1' => 'Metin Menüsü 1',
            'textmenu2' => 'Metin Menüsü 2',
            'textmenu3' => 'Metin Menüsü 3',
            /////////////////////////////////Edit Lang////////////////////////////////////////////////////
            'editlang' => 'Dili Düzenle',
            'chooselang' => 'Dil seçiniz',
             ////////////////////////////////Data Tables/////////////////////////////////////////////////
             'search' => 'Arama',
             'emptyTable' => 'Bilgi yok',
             'infotable' => '_TOTAL_ Girişten _START_ - _END_ Arası gösteriliyor',
             'infoEmpty' => '0 Girişten 0 ile 0 arası gösteriliyor',
             'infoFiltered' => '(Filtrado de _MAX_ total entradas)',
             'lengthMenu' => 'Toplam _MENU_ girişin filtrelenmesi',
             'loadingRecords' => 'Doluyor...',
             'processing' => 'Işleme...',
             'zeroRecords' => 'Sonuç bulunamadı',
             'first' => 'Öncelikle',
             'last' => 'En sonuncu',
             'next' => 'Takip etmek',
             'previous' => 'Anterior',
             /////////////////////////////////Panel User///////////////////////////////////////////////////
             'paneluser' => 'Kullanıcı Kontrol Paneli',
             'recharge' => 'şarj',
             'reset' => 'Sıfırlamak',
             'player' => 'Karakter',
             'createticket' => 'Bilet Oluştur',
             'tickettext' => 'Bilet Metni',
             'addticket' => 'Bilet Gönder',
             'chooseticket' => 'Bilet Türünü Seçin',
             'feedback' => 'Geri bildirim',
             'tickets' => 'Biletler',
             'available' => 'Mevcut',
             'updates' => 'Güncelleme',
             'about' => 'Hakkında',
             'balanceavailable' => 'Kalan bakiye',
             'confirmnewpassword' => 'Yeni şifreyi onayla',
             'newpassword' => 'Yeni Şifre',
             'oldpassword' => 'Eski Şifre',
             'browser' => 'Tarayıcı',
             'changepassword' => 'Şifreyi Değiştir',
             'rechargeok' => 'Ödeme Başarıyla Tamamlandı',
            ///////////////////////////////////0.7//////////////////////////////////////////////////////
            'commands' => 'Komutlar',
            'hdd' => 'HDD',
            'cpu' => 'İşlemci',
            'ram' => 'RAM',
            'version' => 'Yerel Sürüm',
            'id' => 'İD',
            ////////////////////////////////////0.8////////////////////////////////////////////////////
           'changelog' => 'Değişiklik günlüğü',
           'addchangelog' => 'Değişiklik Günlüğü Oluştur',
             

           );
   
           

























           $jp = array(
            ////////////////////////////////////////////Home////////////////////////////////////////////////////////
            'downloadbutton' => 'ダウンロード',
            'onlineplayers' => 'オンラインプレーヤー',
            'listusers' => 'ユーザーのリスト',
            'listplayers' => 'プレーヤーのリスト',
            'shop' => '店',
            'news' => 'ニュース',
            'register' => '登録',
            'password' => 'パスワード',
            'confirmpassword' => 'パスワードを認証する',
            'email' => 'Eメール',
            'forgotpassword' => 'パスワードを忘れましたか？',
            'login' => 'ログイン',
            'statistics' => '統計学',
            'onlinetime' => 'オンライン時間',
            'useronline' => 'オンラインユーザー',
            'usersregistered' => '登録ユーザー',
            'features' => '特徴',
            'copyright' => '著作権',
            'legalnotice' => '法的通知',
            'terms' => '規約と条件',
            'privacity' => 'プライバシー',
            'disconnect' => '切断する',
            'administrativepanel' => '管理パネル',
            'name' => '名前',
            'language' => '言語',
            ////////////////////////////////////////////Players Online////////////////////////////////////////////////////////
            'class' => 'クラス',
            'gender' => '性別',
            'exp' => '経験',
            'map' => '地図',
            ////////////////////////////////////////////Users////////////////////////////////////////////////////////
            'timeplayed' => 'プレイ時間',
            'banned' => '禁止された',
            'muted' => 'ミュート',
            ////////////////////////////////////////////Players////////////////////////////////////////////////////////
            'level' => 'レベル',
            'status' => '状態',
            ////////////////////////////////////////////Shop////////////////////////////////////////////////////////
            'productdetail' => '製品詳細',
            'atackan' => '攻撃アニメーション',
            'interacan' => 'インタラクションアニメーション',
            'return' => '戻る',
            'buy' => '買う',
            'paymentmethod' => '支払方法',
            ////////////////////////////////////////////News////////////////////////////////////////////////////////
            'lastnews' => '最後のニュース',
            'writedby' => 'によって書かれた',
            ////////////////////////////////////////////Mant////////////////////////////////////////////////////////
            'maintenance' => 'メンテナンス',
            'maintenancemessage' => 'こんにちは、メンテナンス中です。すぐに戻ってきます',
            'maintenanceenter' => '管理者としてログイン',
            'enter' => 'ログイン',
            'user' => 'ユーザー',
            /////////////////////////////////////////////Recover////////////////////////////////////////////////////
            'recoverpassword' => 'パスワード復旧',
            'recover' => '回復',
            ////////////////////////////////////////////Dashboard///////////////////////////////////////////////////
            'totalplayers' => '総プレイヤー数',
            'cps' => 'CPSサーバー',
            'directmessage' => 'ダイレクトメッセージ',
            'userorplayer' => 'ユーザーまたはプレーヤー',
            'message' => 'メッセージ',
            'mapmessage' => 'マップメッセージ',
            'mapid' => 'マップID',
            'globalmessage' => 'グローバルメッセージ',
            'consolecommand' => 'コンソールコマンド',
            'command' => '指示',
            'ban' => '禁止',
            'reason' => '理由',
            'duration' => '期間（日）',
            'mute' => 'ミュート',
            'unban' => '禁止を解除する',
            'unmute' => 'ミュートを解除する',
            'teleport' => 'テレポート',
            'kickuser' => 'キックユーザー',
            'Kill' => '殺す',
            ////////////////////////////////////////////Sidebar/////////////////////////////////////////////////////
            'home' => '家',
            'dashboard' => 'ダッシュボード',
            'objects' => 'ダッシュボード',
            'events' => 'イベント',
            'quests' => 'クエスト',
            'logs' => 'ログ',
            'adminaccounts' => '管理者アカウント',
            'config' => '構成',
            'maps' => 'マップ',
            ///////////////////////////////////////Shop Admin/////////////////////////////////////////////////////
            'price' => '価格',
            'products' => '製品',
            'description' => '説明',
            'action' => 'アクション',
            'productpic' => '製品写真',
            'addproduct' => '製品を追加',
            'editproduct' => '製品の編集',
            'edit' => '編集',
            /////////////////////////////////////News Admin//////////////////////////////////////////////////////
            'addnews' => 'ニュースを追加',
            'title' => '題名',
            'textnews' => 'テキストニュース',
            'newspic' => 'ニュース写真',
            'uploadnews' => 'ニュースをアップロード',
            'date' => '日にち',
            ////////////////////////////////////Objects Admin////////////////////////////////////////////////////
            'key' => '鍵',
            ///////////////////////////////////////Logs/////////////////////////////////////////////////////////
            'admin' => '管理者',
            'logs' => 'ログ',
            //////////////////////////////////////Admin Accounts////////////////////////////////////////////////
            'addadminaccount' => '管理者アカウントを追加する',
            /////////////////////////////////////Config/////////////////////////////////////////////////////////
            'gradient' => 'グラデーションカラー',
            'analytics' => 'グーグルアナリティクス',
            'configdownloadbutton' => 'ダウンロードボタン',
            'activate' => '活性化',
            'deactivate' => '活性化',
            'changelegal' => '法改正',
            'changeterms' => '条件の変更',
            'changeprivacity' => 'プライバシーを変更する',
            'editmenus' => 'メニューの編集',
            'change' => '変化する',
            /////////////////////////////////////Edit Legal////////////////////////////////////////////////////
            'editlegal' => '法務の編集',
            'textlegal' => '法務テキスト',
            ////////////////////////////////////Edit Terms////////////////////////////////////////////////////
            'editterms' => '利用規約の編集',
            'textterms' => 'テキスト利用規約',
            ///////////////////////////////////Edit Privacity////////////////////////////////////////////////
            'editprivacity' => 'プライバシーを編集する',
            'textprivacity' => 'テキストのプライバシー',
            ////////////////////////////////////Edit Menus//////////////////////////////////////////////////
            'iconlist' => 'アイコンリスト',
            'descriptionmenu' => 'メニューの説明',
            'iconmenu1' => 'アイコンメニュー1',
            'iconmenu2' => 'アイコンメニュー2',
            'iconmenu3' => 'アイコンメニュー3',
            'titlemenu1' => 'タイトルメニュー1',
            'titlemenu2' => 'タイトルメニュー2',
            'titlemenu2' => 'タイトルメニュー3',
            'textmenu1' => 'テキストメニュー1',
            'textmenu2' => 'テキストメニュー2',
            'textmenu3' => 'テキストメニュー3',
            /////////////////////////////////Edit Lang////////////////////////////////////////////////////
            'editlang' => '言語の編集',
            'chooselang' => '言語を選択',    
             ////////////////////////////////Data Tables/////////////////////////////////////////////////
             'search' => '検索',
             'emptyTable' => 'データがありません',
             'infotable' => 'エントリのうち _START_  から _END_ を表示',
             'infoEmpty' => '0から0のエントリを表示',
             'infoFiltered' => '(合計 _MAX_ エントリのフィルタリング)',
             'lengthMenu' => ' _MENU_ エントリを表示',
             'loadingRecords' => '充電...',
             'processing' => '処理...',
             'zeroRecords' => '結果が見つかりません',
             'first' => '初め',
             'last' => '最新',
             'next' => '続く',
             'previous' => '前',
             /////////////////////////////////Panel User///////////////////////////////////////////////////
             'paneluser' => 'ユーザーダッシュボード',
             'recharge' => '充電する',
             'reset' => 'リセットするには',
             'player' => 'キャラクター',
             'createticket' => 'チケットを作成する',
             'tickettext' => 'チケットテキスト',
             'addticket' => 'チケットを送信する',
             'chooseticket' => 'チケットの種類を選択してください',
             'feedback' => 'フィードバック',
             'tickets' => '切符売場',
             'available' => '利用可能',
             'updates' => 'アップデート',
             'about' => '約',
             'balanceavailable' => '利用可能残高',
             'confirmnewpassword' => '新しいパスワードを確認',
             'newpassword' => '新しいパスワード',
             'oldpassword' => '現在のパスワード',
             'browser' => 'ブラウザ',
             'changepassword' => 'パスワードを変更する',
             'rechargeok' => '支払いが正常に完了しました',
            ///////////////////////////////////0.7//////////////////////////////////////////////////////
            'commands' => 'コマンド',
            'hdd' => 'HDD',
            'cpu' => 'CPU',
            'ram' => 'RAM',
            'version' => 'ローカルバージョン',
            'id' => 'ID',
            ////////////////////////////////////0.8////////////////////////////////////////////////////
           'changelog' => '変更ログ',
           'addchangelog' => '変更ログを作成する',
         
           );





























           $de = array(
            ////////////////////////////////////////////Home////////////////////////////////////////////////////////
            'downloadbutton' => 'Download',
            'onlineplayers' => 'Online-Spieler',
            'listusers' => 'Benutzer auflisten',
            'listplayers' => 'Spieler auflisten',
            'shop' => 'Geschäft',
            'news' => 'Nachrichten',
            'register' => 'Registrieren',
            'password' => 'Passwort',
            'confirmpassword' => 'Passwort bestätigen',
            'email' => 'Email',
            'forgotpassword' => 'Sie haben Ihr Passwort vergessen?',
            'login' => 'Anmeldung',
            'statistics' => 'Statistiken',
            'onlinetime' => 'Online-Zeit',
            'useronline' => 'Benutzer online',
            'usersregistered' => 'Benutzer registriert',
            'features' => 'Merkmale',
            'copyright' => 'Urheberrechte',
            'legalnotice' => 'Impressum',
            'terms' => 'Geschäftsbedingungen',
            'privacity' => 'Datenschutz',
            'disconnect' => 'Trennen',
            'administrativepanel' => 'Verwaltungsbereich',
            'name' => 'Name',
            'language' => 'Sprache',
            ////////////////////////////////////////////Players Online////////////////////////////////////////////////////////
            'class' => 'Klasse',
            'gender' => 'Geschlecht',
            'exp' => 'Erfahrung',
            'map' => 'Karte',
            ////////////////////////////////////////////Users////////////////////////////////////////////////////////
            'timeplayed' => 'Gespielte Zeit',
            'banned' => 'Verboten',
            'muted' => 'Stummgeschaltet',
            ////////////////////////////////////////////Players////////////////////////////////////////////////////////
            'level' => 'Eben',
            'status' => 'Status',
            ////////////////////////////////////////////Shop////////////////////////////////////////////////////////
            'productdetail' => 'Produktdetails',
            'atackan' => 'Angriffsanimation',
            'interacan' => 'Interaktionsanimation',
            'return' => 'Zurückkehren',
            'buy' => 'Besorgen',
            'paymentmethod' => 'Zahlungsmethode',
            ////////////////////////////////////////////News////////////////////////////////////////////////////////
            'lastnews' => 'Letzte Nachrichten',
            'writedby' => 'Geschrieben von',
            ////////////////////////////////////////////Mant////////////////////////////////////////////////////////
            'maintenance' => 'Wartung',
            'maintenancemessage' => 'Hallo, wir sind in der Wartung. Bald sind wir zurück',
            'maintenanceenter' => 'Melden Sie sich als Administrator an',
            'enter' => 'Anmeldung',
            'user' => 'Benutzer',
            /////////////////////////////////////////////Recover////////////////////////////////////////////////////
            'recoverpassword' => 'Passwort wiederherstellen',
            'recover' => 'Genesen',
            ////////////////////////////////////////////Dashboard///////////////////////////////////////////////////
            'totalplayers' => 'Spieler insgesamt',
            'cps' => 'CPS-Server',
            'directmessage' => 'Direktnachricht',
            'userorplayer' => 'Benutzer oder Plater',
            'message' => 'Nachricht',
            'mapmessage' => 'Kartennachricht',
            'mapid' => 'Karten-ID',
            'globalmessage' => 'Globale Botschaft',
            'consolecommand' => 'Konsolenbefehl',
            'command' => 'Befehl',
            'ban' => 'Verbot',
            'reason' => 'Grund',
            'duration' => 'Dauer (Tage)',
            'mute' => 'Stumm',
            'unban' => 'Sperre aufheben',
            'unmute' => 'Stummschaltung aufheben',
            'teleport' => 'Teleportieren',
            'kickuser' => 'Kick-Benutzer',
            'Kill' => 'Töten',
            ////////////////////////////////////////////Sidebar/////////////////////////////////////////////////////
            'home' => 'Heim',
            'dashboard' => 'Armaturenbrett',
            'objects' => 'Objekte',
            'events' => 'Veranstaltungen',
            'quests' => 'Aufgaben',
            'logs' => 'Protokolle',
            'adminaccounts' => 'Admin-Konten',
            'config' => 'Konfig',
            'maps' => 'Konfig',
            ///////////////////////////////////////Shop Admin/////////////////////////////////////////////////////
            'price' => 'Preis',
            'products' => 'Produkte',
            'description' => 'Beschreibung',
            'action' => 'Aktion',
            'productpic' => 'Produktbild',
            'addproduct' => 'Produkt hinzufügen',
            'editproduct' => 'Produkt bearbeiten',
            'edit' => 'Bearbeiten',
            /////////////////////////////////////News Admin//////////////////////////////////////////////////////
            'addnews' => 'Bearbeiten',
            'title' => 'Titel',
            'textnews' => 'Textnachrichten',
            'newspic' => 'Nachrichtenbild',
            'uploadnews' => 'Nachrichten hochladen',
            'date' => 'Datum',
            ////////////////////////////////////Objects Admin////////////////////////////////////////////////////
            'key' => 'Taste',
            ///////////////////////////////////////Logs/////////////////////////////////////////////////////////
            'admin' => 'Administrator',
            'logs' => 'Protokolle',
            //////////////////////////////////////Admin Accounts////////////////////////////////////////////////
            'addadminaccount' => 'Administratorkonto hinzufügen',
            /////////////////////////////////////Config/////////////////////////////////////////////////////////
            'gradient' => 'Verlaufsfarben',
            'analytics' => 'Google Analytics',
            'configdownloadbutton' => 'Download-Button',
            'activate' => 'Aktivieren Sie',
            'deactivate' => 'Deaktivieren',
            'changelegal' => 'Rechtliches ändern',
            'changeterms' => 'Bedingungen ändern',
            'changeprivacity' => 'Datenschutz ändern',
            'editmenus' => 'Menüs bearbeiten',
            'change' => 'Veränderung',
            /////////////////////////////////////Edit Legal////////////////////////////////////////////////////
            'editlegal' => 'Rechtliche Hinweise bearbeiten',
            'textlegal' => 'Rechtstext',
            ////////////////////////////////////Edit Terms////////////////////////////////////////////////////
            'editterms' => 'AGB bearbeiten',
            'textterms' => 'Allgemeine Geschäftsbedingungen in Textform',
            ///////////////////////////////////Edit Privacity////////////////////////////////////////////////
            'editprivacity' => 'Datenschutz bearbeiten',
            'textprivacity' => 'Text-Datenschutz',
            ////////////////////////////////////Edit Menus//////////////////////////////////////////////////
            'iconlist' => 'Symbolliste',
            'descriptionmenu' => 'Beschreibung des Menüs',
            'iconmenu1' => 'Symbolmenü 1',
            'iconmenu2' => 'Symbolmenü 2',
            'iconmenu3' => 'Symbolmenü 3',
            'titlemenu1' => 'Titelmenü 1',
            'titlemenu2' => 'Titelmenü 2',
            'titlemenu2' => 'Titelmenü 3',
            'textmenu1' => 'Textmenü 1',
            'textmenu2' => 'Textmenü 2',
            'textmenu3' => 'Textmenü 3',
            /////////////////////////////////Edit Lang////////////////////////////////////////////////////
            'editlang' => 'Sprache bearbeiten',
            'chooselang' => 'Sprache wählen',
             ////////////////////////////////Data Tables/////////////////////////////////////////////////
             'search' => 'Suche',
             'emptyTable' => 'Es gibt keine Informationen',
             'infotable' => 'Es werden _START_ bis _END_ von _TOTAL_ Einträgen angezeigt',
             'infoEmpty' => 'Es werden 0 bis 0 von 0 Einträgen angezeigt',
             'infoFiltered' => '(Filterung von insgesamt _MAX_ Einträgen)',
             'lengthMenu' => '_MENU_ Einträge anzeigen',
             'loadingRecords' => 'Laden...',
             'processing' => 'Wird bearbeitet...',
             'zeroRecords' => 'Keine Ergebnisse gefunden',
             'first' => 'Zuerst',
             'last' => 'Neueste',
             'next' => 'Folgend',
             'previous' => 'Vorherige',
             /////////////////////////////////Panel User///////////////////////////////////////////////////
             'paneluser' => 'Benutzer-Dashboard',
             'recharge' => 'Aufladen',
             'reset' => 'Zurücksetzen',
             'player' => 'Charakter',
             'createticket' => 'Ticket erstellen',
             'tickettext' => 'Tickettext',
             'addticket' => 'Ticket übermitteln',
             'chooseticket' => 'Wählen Sie die Art des Tickets',
             'feedback' => 'Feedback',
             'tickets' => 'Eintrittskarten',
             'available' => 'Verfügbar',
             'updates' => 'Aktualisieren',
             'about' => 'Um',
             'balanceavailable' => 'Verfügbares Guthaben',
             'confirmnewpassword' => 'Bestätige neues Passwort',
             'newpassword' => 'Neues Passwort',
             'oldpassword' => 'Jetziges Passwort',
             'browser' => 'Browser',
             'changepassword' => 'Passwort ändern',
             'rechargeok' => 'Zahlung erfolgreich abgeschlossen',
            ///////////////////////////////////0.7//////////////////////////////////////////////////////
            'commands' => 'Kommandanten',
            'hdd' => 'Festplatte',
            'cpu' => 'Zentralprozessor',
            'ram' => 'RAM',
            'version' => 'Lokale Version',
            'id' => 'ID',
            ////////////////////////////////////0.8////////////////////////////////////////////////////
           'changelog' => 'Änderungsprotokoll',
           'addchangelog' => 'Änderungsprotokoll erstellen',
             
        );














        $ru = array(
             ////////////////////////////////////////////Home////////////////////////////////////////////////////////
             'downloadbutton' => 'скачать',
             'onlineplayers' => 'онлайн-игроки',
             'listusers' => 'список пользователей',
             'listplayers' => 'список игроков',
             'shop' => 'магазин',
             'news' => 'Новости',
             'register' => 'регистр',
             'password' => 'пароль',
             'confirmpassword' => 'Подтвердить Пароль',
             'email' => 'электронной почты',
             'forgotpassword' => 'забыл пароль?',
             'login' => 'логин',
             'statistics' => 'статистика',
             'onlinetime' => 'онлайн время',
             'useronline' => 'пользователи онлайн',
             'usersregistered' => 'зарегистрированные пользователи',
             'features' => 'Особенности',
             'copyright' => 'Авторские права',
             'legalnotice' => 'юридическое уведомление',
             'terms' => 'условия',
             'privacity' => 'конфиденциальность',
             'disconnect' => 'Отключить',
             'administrativepanel' => 'административная панель',
             'name' => 'имя',
             'language' => 'язык',
             ////////////////////////////////////////////Players Online////////////////////////////////////////////////////////
             'class' => 'класс',
             'gender' => 'Пол',
             'exp' => 'опыт',
             'map' => 'карта',
             ////////////////////////////////////////////Users////////////////////////////////////////////////////////
             'timeplayed' => 'время в игре',
             'banned' => 'запрещен',
             'muted' => 'приглушенный',
             ////////////////////////////////////////////Players////////////////////////////////////////////////////////
             'level' => 'уровень',
             'status' => 'статус',
             ////////////////////////////////////////////Shop////////////////////////////////////////////////////////
             'productdetail' => 'информация о продукте',
             'atackan' => 'Анимация атаки',
             'interacan' => 'Анимация взаимодействия',
             'return' => 'возвращаться',
             'buy' => 'купить',
             'paymentmethod' => 'Метод оплаты',
             ////////////////////////////////////////////News////////////////////////////////////////////////////////
             'lastnews' => 'Последние новости',
             'writedby' => 'Написано',
             ////////////////////////////////////////////Mant////////////////////////////////////////////////////////
             'maintenance' => 'техническое обслуживание',
             'maintenancemessage' => 'привет, мы на техническом обслуживании. скоро мы вернемся',
             'maintenanceenter' => 'Войти как администратор',
             'enter' => 'логин',
             'user' => 'пользователь',
             /////////////////////////////////////////////Recover////////////////////////////////////////////////////
             'recoverpassword' => 'Восстановить пароль',
             'recover' => 'Восстанавливаться',
             ////////////////////////////////////////////Dashboard///////////////////////////////////////////////////
             'totalplayers' => 'Всего игроков',
             'cps' => 'CPS-сервер',
             'directmessage' => 'Личное сообщение',
             'userorplayer' => 'пользователь или игрок',
             'message' => 'сообщение',
             'mapmessage' => 'Сообщение карты',
             'mapid' => 'идентификатор карты',
             'globalmessage' => 'Глобальное сообщение',
             'consolecommand' => 'консольная команда',
             'command' => 'Команда',
             'ban' => 'запрет',
             'reason' => 'Причина',
             'duration' => 'Продолжительность(Дни)',
             'mute' => 'немой',
             'unban' => 'Разблокировать',
             'unmute' => 'включить звук',
             'teleport' => 'телепорт',
             'kickuser' => 'выгнать пользователя',
             'Kill' => 'убийство',
             ////////////////////////////////////////////Sidebar/////////////////////////////////////////////////////
             'home' => 'дом',
             'dashboard' => 'приборная доска',
             'objects' => 'Объекты',
             'events' => 'События',
             'quests' => 'квест',
             'logs' => 'журнал',
             'adminaccounts' => 'Учетные записи администратора',
             'config' => 'конфигурация',
             'maps' => 'карты',
             ///////////////////////////////////////Shop Admin/////////////////////////////////////////////////////
             'price' => 'Цена',
             'products' => 'Товары',
             'description' => 'Описание',
             'action' => 'Действие',
             'productpic' => 'Изображение продукта',
             'addproduct' => 'Добавить продукт',
             'editproduct' => 'Редактировать продукт',
             'edit' => 'Редактировать',
             /////////////////////////////////////News Admin//////////////////////////////////////////////////////
             'addnews' => 'Добавить новость',
             'title' => 'Заголовок',
             'textnews' => 'текстовые новости',
             'newspic' => 'Новости Фото',
             'uploadnews' => 'Загрузить новости',
             'date' => 'Свидание',
             ////////////////////////////////////Objects Admin////////////////////////////////////////////////////
             'key' => 'Ключ',
             ///////////////////////////////////////Logs/////////////////////////////////////////////////////////
             'admin' => 'администратор',
             'logs' => 'Журналы',
             //////////////////////////////////////Admin Accounts////////////////////////////////////////////////
             'addadminaccount' => 'Add Admin Account',
             /////////////////////////////////////Config/////////////////////////////////////////////////////////
             'gradient' => 'Градиентные цвета',
             'analytics' => 'Гугл Аналитика',
             'configdownloadbutton' => 'Кнопка загрузки',
             'activate' => 'Активировать',
             'deactivate' => 'Деактивировать',
             'changelegal' => 'Изменить юридический',
             'changeterms' => 'Изменить условия',
             'changeprivacity' => 'Изменить конфиденциальность',
             'editmenus' => 'Редактировать меню',
             'change' => 'Изменять',
             /////////////////////////////////////Edit Legal////////////////////////////////////////////////////
             'editlegal' => 'редактировать юридический',
             'textlegal' => 'текст легальный',
             ////////////////////////////////////Edit Terms////////////////////////////////////////////////////
             'editterms' => 'редактировать условия',
             'textterms' => 'текстовые термины',
             ///////////////////////////////////Edit Privacity////////////////////////////////////////////////
             'editprivacity' => 'изменить конфиденциальность',
             'textprivacity' => 'конфиденциальность текста',
             ////////////////////////////////////Edit Menus//////////////////////////////////////////////////
             'iconlist' => 'Список значков',
             'descriptionmenu' => 'меню описания',
             'iconmenu1' => 'значок меню 1',
             'iconmenu2' => 'значок меню 2',
             'iconmenu3' => 'значок меню 3',
             'titlemenu1' => 'меню заголовка 1',
             'titlemenu2' => 'меню заголовка 2',
             'titlemenu2' => 'меню заголовка 3',
             'textmenu1' => 'Текстовое меню 1',
             'textmenu2' => 'Текстовое меню 2',
             'textmenu3' => 'Текстовое меню 3',
             /////////////////////////////////Edit Lang////////////////////////////////////////////////////
             'editlang' => 'изменить язык',
             'chooselang' => 'выберите язык',
              ////////////////////////////////Data Tables/////////////////////////////////////////////////
              'search' => 'поиск',
              'emptyTable' => 'информация отсутствует',
              'infotable' => 'Показано с _START_ по _END_ из _TOTAL_ записей',
              'infoEmpty' => 'Показано от 0 до 0 из 0 записей',
              'infoFiltered' => '(Фильтрация всего  _MAX_ записей)',
              'lengthMenu' => 'Показать _MENU_ запись',
              'loadingRecords' => 'загрузка...',
              'processing' => 'обработка...',
              'zeroRecords' => 'Результатов не найдено',
              'first' => 'первый',
              'last' => 'последний',
              'next' => 'следующий',
              'previous' => 'предыдущий',
              /////////////////////////////////Panel User///////////////////////////////////////////////////
              'paneluser' => 'панель пользователя',
              'recharge' => 'перезарядка',
              'reset' => 'перезагрузить',
              'player' => 'игрок',
              'createticket' => 'создать тикет',
              'tickettext' => 'текст билета',
              'addticket' => 'добавить билет',
              'chooseticket' => 'выбрать билет',
              'feedback' => 'Обратная связь',
              'tickets' => 'Билеты',
              'available' => 'доступный',
              'updates' => 'Обновления',
              'about' => 'около',
              'balanceavailable' => 'доступный баланс',
              'confirmnewpassword' => 'подтвердите новый пароль',
              'newpassword' => 'Новый пароль',
              'oldpassword' => 'Старый пароль',
              'browser' => 'браузер',
              'changepassword' => 'изменить пароль',
              'rechargeok' => 'перезарядка в порядке',
            ///////////////////////////////////0.7//////////////////////////////////////////////////////
            'commands' => 'команды',
            'hdd' => 'жесткий диск',
            'cpu' => 'Процессор',
            'ram' => 'БАРАН',
            'version' => 'Локальная версия',
            'id' => 'Я БЫ',
            ////////////////////////////////////0.8////////////////////////////////////////////////////
           'changelog' => 'Список изменений',
           'addchangelog' => 'Создать журнал изменений',

             
        );














        $zh = array(
            ////////////////////////////////////////////Home////////////////////////////////////////////////////////
            'downloadbutton' => '下载',
            'onlineplayers' => '在线玩家',
            'listusers' => '列出用户',
            'listplayers' => '列出玩家',
            'shop' => '商店',
            'news' => '新闻',
            'register' => '注册',
            'password' => '密码',
            'confirmpassword' => '确认密码',
            'email' => '电子邮件',
            'forgotpassword' => '忘记密码？',
            'login' => '登录',
            'statistics' => '统计数据',
            'onlinetime' => '在线时间',
            'useronline' => '在线用户',
            'usersregistered' => '注册用户',
            'features' => '特点',
            'copyright' => '版权',
            'legalnotice' => '法律声明',
            'terms' => '使用条款',
            'privacity' => '隐私政策',
            'disconnect' => '断开连接',
            'administrativepanel' => '管理面板',
            'name' => '名称',
            'language' => '语言',
            ////////////////////////////////////////////Players Online////////////////////////////////////////////////////////
            'class' => '职业',
            'gender' => '性别',
            'exp' => '经验',
            'map' => '地图',
            ////////////////////////////////////////////Users////////////////////////////////////////////////////////
            'timeplayed' => '游戏时间',
            'banned' => '封禁',
            'muted' => '禁言',
            ////////////////////////////////////////////Players////////////////////////////////////////////////////////
            'level' => '等级',
            'status' => '状态',
            ////////////////////////////////////////////Shop////////////////////////////////////////////////////////
            'productdetail' => '商品详情',
            'atackan' => '攻击动画',
            'interacan' => '互动动画',
            'return' => '返回',
            'buy' => '购买',
            'paymentmethod' => '支付方式',
            ////////////////////////////////////////////News////////////////////////////////////////////////////////
            'lastnews' => '最新新闻',
            'writedby' => '作者',
            ////////////////////////////////////////////Mant////////////////////////////////////////////////////////
            'maintenance' => '维护',
            'maintenancemessage' => '您好，我们正在进行维护。很快我们将回来。',
            'maintenanceenter' => '以管理员身份登录',
            'enter' => '登录',
            'user' => '用户',
            /////////////////////////////////////////////Recover////////////////////////////////////////////////////
            'recoverpassword' => '找回密码',
            'recover' => '找回',
            ////////////////////////////////////////////Dashboard///////////////////////////////////////////////////
            'totalplayers' => '总玩家数',
            'cps' => 'CPS 服务器',
            'directmessage' => '直接消息',
            'userorplayer' => '用户或玩家',
            'message' => '消息',
            'mapmessage' => '地图消息',
            'mapid' => '地图ID',
            'globalmessage' => '全局消息',
            'consolecommand' => '控制台命令',
            'command' => '命令',
            'ban' => '封禁',
            'reason' => '原因',
            'duration' => '封禁时长（天）',
            'mute' => '禁言',
            'unban' => '解封',
            'unmute' => '解禁',
            'teleport' => '传送',
            'kickuser' => '踢出用户',
            'Kill' => '杀死',
            ////////////////////////////////////////////Sidebar/////////////////////////////////////////////////////
            'home' => '首页',
            'dashboard' => '仪表板',
            'objects' => '物品',
            'events' => '事件',
            'quests' => '任务',
            'logs' => '日志',
            'adminaccounts' => '管理员账户',
            'config' => '配置',
            'maps' => '地图',
            ///////////////////////////////////////Shop Admin/////////////////////////////////////////////////////
            'price' => '价格',
            'products' => '商品',
            'description' => '描述',
            'action' => '操作',
            'productpic' => '商品图片',
            'addproduct' => '添加商品',
            'editproduct' => '编辑商品',
            'edit' => '编辑',
            /////////////////////////////////////News Admin//////////////////////////////////////////////////////
            'addnews' => '添加新闻',
            'title' => '标题',
            'textnews' => '新闻内容',
            'newspic' => '新闻图片',
            'uploadnews' => '上传新闻',
            'date' => '日期',
            ////////////////////////////////////Objects Admin////////////////////////////////////////////////////
            'key' => '关键字',
            ///////////////////////////////////////Logs/////////////////////////////////////////////////////////
            'admin' => '管理员',
            'logs' => '日志',
            //////////////////////////////////////Admin Accounts////////////////////////////////////////////////
            'addadminaccount' => '添加管理员账户',
            /////////////////////////////////////Config/////////////////////////////////////////////////////////
            'gradient' => '渐变颜色',
            'analytics' => 'Google Analytics',
            'configdownloadbutton' => '下载按钮',
            'activate' => '激活',
            'deactivate' => '停用',
            'changelegal' => '更改法律声明',
            'changeterms' => '更改使用条款',
            'changeprivacity' => '更改隐私政策',
            'editmenus' => '编辑菜单',
            'change' => '更改',
            /////////////////////////////////////Edit Legal////////////////////////////////////////////////////
            'editlegal' => '编辑法律声明',
            'textlegal' => '法律声明文本',
            ////////////////////////////////////Edit Terms////////////////////////////////////////////////////
            'editterms' => '编辑使用条款',
            'textterms' => '使用条款文本',
            ///////////////////////////////////Edit Privacity////////////////////////////////////////////////
            'editprivacity' => '编辑隐私政策',
            'textprivacity' => '隐私政策文本',
            ////////////////////////////////////Edit Menus//////////////////////////////////////////////////
            'iconlist' => '图标列表',
            'descriptionmenu' => '菜单描述',
            'iconmenu1' => '菜单图标1',
            'iconmenu2' => '菜单图标2',
            'iconmenu3' => '菜单图标3',
            'titlemenu1' => '菜单标题1',
            'titlemenu2' => '菜单标题2',
            'titlemenu2' => '菜单标题3',
            'textmenu1' => '菜单文本1',
            'textmenu2' => '菜单文本2',
            'textmenu3' => '菜单文本3',
            /////////////////////////////////Edit Lang////////////////////////////////////////////////////
            'editlang' => '编辑语言',
            'chooselang' => '选择语言',
             ////////////////////////////////Data Tables/////////////////////////////////////////////////
             'search' => '搜索',
             'emptyTable' => '没有信息',
             'infotable' => '显示 _START_ 到 _END_ 条记录，共 _TOTAL_ 条',
             'infoEmpty' => '显示 0 到 0 条记录，共 0 条',
             'infoFiltered' => '（从 _MAX_ 条记录中筛选出的结果）',
             'lengthMenu' => '显示 _MENU_ 条记录',
             'loadingRecords' => '加载中...',
             'processing' => '处理中...',
             'zeroRecords' => '没有找到匹配的记录',
             'first' => '第一页',
             'last' => '最后一页',
             'next' => '下一页',
             'previous' => '上一页',
             /////////////////////////////////Panel User///////////////////////////////////////////////////
             'paneluser' => '用户面板',
             'recharge' => '充值',
             'reset' => '重置',
             'player' => '角色',
             'createticket' => '创建工单',
             'tickettext' => '工单内容',
             'addticket' => '发送工单',
             'chooseticket' => '选择工单类型',
             'feedback' => '反馈',
             'tickets' => '工单',
             'available' => '可用',
             'updates' => '更新',
             'about' => '关于',
             'balanceavailable' => '可用余额',
             'confirmnewpassword' => '确认新密码',
             'newpassword' => '新密码',
             'oldpassword' => '当前密码',
             'browser' => '浏览器',
             'changepassword' => '更改密码',
             'rechargeok' => '充值成功',
             
             
        );














        $fr = array(
            ////////////////////////////////////////////Home////////////////////////////////////////////////////////
            'downloadbutton' => 'Télécharger',
            'onlineplayers' => 'Joueurs en ligne',
            'listusers' => 'Lister les utilisateurs',
            'listplayers' => 'Lister les joueurs',
            'shop' => 'Boutique',
            'news' => 'Actualités',
            'register' => "S'inscrire",
            'password' => 'Mot de passe',
            'confirmpassword' => 'Confirmer le mot de passe',
            'email' => 'E-mail',
            'forgotpassword' => 'Vous avez oublié votre mot de passe ?',
            'login' => 'Connexion',
            'statistics' => 'Statistiques',
            'onlinetime' => 'Temps en ligne',
            'useronline' => 'Utilisateurs en ligne',
            'usersregistered' => 'Utilisateurs enregistrés',
            'features' => 'Fonctionnalités',
            'copyright' => "Droits d'auteur",
            'legalnotice' => 'Mentions légales',
            'terms' => 'Conditions générales',
            'privacity' => 'Confidentialité',
            'disconnect' => 'Déconnexion',
            'administrativepanel' => "Panneau d'administration",
            'name' => 'Nom',
            'language' => 'Langue',
            ////////////////////////////////////////////Players Online////////////////////////////////////////////////////////
            'class' => 'Classe',
            'gender' => 'Genre',
            'exp' => 'Expérience',
            'map' => 'Carte',
            ////////////////////////////////////////////Users////////////////////////////////////////////////////////
            'timeplayed' => 'Temps de jeu',
            'banned' => 'Banni',
            'muted' => 'Muet',
            ////////////////////////////////////////////Players////////////////////////////////////////////////////////
            'level' => 'Niveau',
            'status' => 'Statut',
            ////////////////////////////////////////////Shop////////////////////////////////////////////////////////
            'productdetail' => 'Détails du produit',
            'atackan' => "Animation d'attaque",
            'interacan' => "Animation d'interaction",
            'return' => 'Retour',
            'buy' => 'Acheter',
            'paymentmethod' => 'Moyen de paiement',
            ////////////////////////////////////////////News////////////////////////////////////////////////////////
            'lastnews' => 'Dernières actualités',
            'writedby' => 'Écrit par',
            ////////////////////////////////////////////Mant////////////////////////////////////////////////////////
            'maintenance' => 'Maintenance',
            'maintenancemessage' => 'Bonjour, nous sommes en maintenance. Nous serons bientôt de retour',
            'maintenanceenter' => "Se connecter en tant qu'administrateur",
            'enter' => 'Connexion',
            'user' => 'Utilisateur',
            /////////////////////////////////////////////Recover////////////////////////////////////////////////////
            'recoverpassword' => 'Récupérer le mot de passe',
            'recover' => 'Récupérer',
            ////////////////////////////////////////////Dashboard///////////////////////////////////////////////////
            'totalplayers' => 'Total des joueurs',
            'cps' => 'Serveur CPS',
            'directmessage' => 'Message direct',
            'userorplayer' => 'Utilisateur ou joueur',
            'message' => 'Message',
            'mapmessage' => 'Message de la carte',
            'mapid' => 'ID de la carte',
            'globalmessage' => 'Message global',
            'consolecommand' => 'Commande de console',
            'command' => 'Commande',
            'ban' => 'Bannir',
            'reason' => 'Raison',
            'duration' => 'Durée (jours)',
            'mute' => 'Muet',
            'unban' => 'Débannir',
            'unmute' => 'Démuter',
            'teleport' => 'Téléportation',
            'kickuser' => "Expulser l'utilisateur",
            'Kill' => 'Tuer',
            ////////////////////////////////////////////Sidebar/////////////////////////////////////////////////////
            'home' => 'Accueil',
            'dashboard' => 'Tableau de bord',
            'objects' => 'Objets',
            'events' => 'Événements',
            'quests' => 'Quêtes',
            'logs' => 'Journaux',
            'adminaccounts' => 'Comptes administrateurs',
            'config' => 'Configuration',
            'maps' => 'Cartes',
            ///////////////////////////////////////Shop Admin/////////////////////////////////////////////////////
            'price' => 'Prix',
            'products' => 'Produits',
            'description' => 'Description',
            'action' => 'Action',
            'productpic' => 'Image du produit',
            'addproduct' => 'Ajouter un produit',
            'editproduct' => 'Modifier le produit',
            'edit' => 'Modifier',
            /////////////////////////////////////News Admin//////////////////////////////////////////////////////
            'addnews' => 'Ajouter des actualités',
            'title' => 'Titre',
            'textnews' => 'Texte des actualités',
            'newspic' => 'Image des actualités',
            'uploadnews' => 'Télécharger des actualités',
            'date' => 'Date',
            ////////////////////////////////////Objects Admin////////////////////////////////////////////////////
            'key' => 'Clé',
            ///////////////////////////////////////Logs/////////////////////////////////////////////////////////
            'admin' => 'Administrateur',
            'logs' => 'Journaux',
            //////////////////////////////////////Admin Accounts////////////////////////////////////////////////
            'addadminaccount' => 'Ajouter un compte administrateur',
            /////////////////////////////////////Config/////////////////////////////////////////////////////////
            'gradient' => 'Couleurs de dégradé',
            'analytics' => 'Google Analytics',
            'configdownloadbutton' => 'Bouton de téléchargement',
            'activate' => 'Activer',
            'deactivate' => 'Désactiver',
            'changelegal' => 'Changer les mentions légales',
            'changeterms' => 'Changer les conditions générales',
            'changeprivacity' => 'Changer la confidentialité',
            'editmenus' => 'Modifier les menus',
            'change' => 'Changer',
            /////////////////////////////////////Edit Legal////////////////////////////////////////////////////
            'editlegal' => 'Modifier les mentions légales',
            'textlegal' => 'Texte des mentions légales',
            ////////////////////////////////////Edit Terms////////////////////////////////////////////////////
            'editterms' => 'Modifier les termes et conditions',
            'textterms' => 'Texte des termes et conditions',
            ///////////////////////////////////Edit Privacity////////////////////////////////////////////////
            'editprivacity' => 'Modifier la confidentialité',
            'textprivacity' => 'Texte de la confidentialité',
            ////////////////////////////////////Edit Menus//////////////////////////////////////////////////
            'iconlist' => "Liste d'icônes",
            'descriptionmenu' => 'Description du menu',
            'iconmenu1' => 'Icône du menu 1',
            'iconmenu2' => 'Icône du menu 2',
            'iconmenu3' => 'Icône du menu 3',
            'titlemenu1' => 'Titre du menu 1',
            'titlemenu2' => 'Titre du menu 2',
            'titlemenu2' => 'Titre du menu 3',
            'textmenu1' => 'Texte du menu 1',
            'textmenu2' => 'Texte du menu 2',
            'textmenu3' => 'Texte du menu 3',
            /////////////////////////////////Edit Lang////////////////////////////////////////////////////
            'editlang' => 'Modifier la langue',
            'chooselang' => 'Choisir la langue',
             ////////////////////////////////Data Tables/////////////////////////////////////////////////
             'search' => 'Rechercher',
             'emptyTable' => 'Aucune information',
             'infotable' => 'Affichage de _START_ à _END_ sur _TOTAL_ entrées',
             'infoEmpty' => 'Affichage de 0 à 0 sur 0 entrées',
             'infoFiltered' => '(filtré de _MAX_ entrées au total)',
             'lengthMenu' => 'Afficher _MENU_ entrées',
             'loadingRecords' => 'Chargement en cours...',
             'processing' => 'En traitement...',
             'zeroRecords' => 'Aucun résultat trouvé',
             'first' => 'Premier',
             'last' => 'Dernier',
             'next' => 'Suivant',
             'previous' => 'Précédent',
             /////////////////////////////////Panel User///////////////////////////////////////////////////
             'paneluser' => 'Panneau utilisateur',
             'recharge' => 'Recharger',
             'reset' => 'Réinitialiser',
             'player' => 'Joueur',
             'createticket' => 'Créer un ticket',
             'tickettext' => 'Texte du ticket',
             'addticket' => 'Envoyer le ticket',
             'chooseticket' => 'Choisir le type de ticket',
             'feedback' => "Retour d'information",
             'tickets' => 'Tickets',
             'available' => 'Disponible',
             'updates' => 'Mises à jour',
             'about' => 'À propos',
             'balanceavailable' => 'Solde disponible',
             'confirmnewpassword' => 'Confirmer le nouveau mot de passe',
             'newpassword' => 'Nouveau mot de passe',
             'oldpassword' => 'Mot de passe actuel',
             'browser' => 'Navigateur',
             'changepassword' => 'Changer le mot de passe',
             'rechargeok' => 'Paiement réussi',
             
        );
















        $pt = array(
            ////////////////////////////////////////////Home////////////////////////////////////////////////////////
            'downloadbutton' => 'Baixar',
            'onlineplayers' => 'Jogadores online',
            'listusers' => 'Listar usuários',
            'listplayers' => 'Listar jogadores',
            'shop' => 'Loja',
            'news' => 'Notícias',
            'register' => 'Registrar',
            'password' => 'Senha',
            'confirmpassword' => 'Confirmar senha',
            'email' => 'E-mail',
            'forgotpassword' => 'Esqueceu sua senha?',
            'login' => 'Login',
            'statistics' => 'Estatísticas',
            'onlinetime' => 'Tempo online',
            'useronline' => 'Usuários online',
            'usersregistered' => 'Usuários registrados',
            'features' => 'Recursos',
            'copyright' => 'Direitos autorais',
            'legalnotice' => 'Aviso legal',
            'terms' => 'Termos de serviço',
            'privacity' => 'Privacidade',
            'disconnect' => 'Desconectar',
            'administrativepanel' => 'Painel administrativo',
            'name' => 'Nome',
            'language' => 'Idioma',
            ////////////////////////////////////////////Players Online////////////////////////////////////////////////////////
            'class' => 'Classe',
            'gender' => 'Gênero',
            'exp' => 'Experiência',
            'map' => 'Mapa',
            ////////////////////////////////////////////Users////////////////////////////////////////////////////////
            'timeplayed' => 'Tempo de jogo',
            'banned' => 'Banido',
            'muted' => 'Silenciado',
            ////////////////////////////////////////////Players////////////////////////////////////////////////////////
            'level' => 'Nível',
            'status' => 'Status',
            ////////////////////////////////////////////Shop////////////////////////////////////////////////////////
            'productdetail' => 'Detalhes do produto',
            'atackan' => 'Animação de ataque',
            'interacan' => 'Animação de interação',
            'return' => 'Retornar',
            'buy' => 'Comprar',
            'paymentmethod' => 'Método de pagamento',
            ////////////////////////////////////////////News////////////////////////////////////////////////////////
            'lastnews' => 'Últimas notícias',
            'writedby' => 'Escrito por',
            ////////////////////////////////////////////Mant////////////////////////////////////////////////////////
            'maintenance' => 'Manutenção',
            'maintenancemessage' => 'Olá, estamos em manutenção. Em breve estaremos de volta',
            'maintenanceenter' => 'Login como administrador',
            'enter' => 'Login',
            'user' => 'Usuário',
            /////////////////////////////////////////////Recover////////////////////////////////////////////////////
            'recoverpassword' => 'Recuperar senha',
            'recover' => 'Recuperar',
            ////////////////////////////////////////////Dashboard///////////////////////////////////////////////////
            'totalplayers' => 'Total de jogadores',
            'cps' => 'Servidor CPS',
            'directmessage' => 'Mensagem direta',
            'userorplayer' => 'Usuário ou jogador',
            'message' => 'Mensagem',
            'mapmessage' => 'Mensagem do mapa',
            'mapid' => 'ID do mapa',
            'globalmessage' => 'Mensagem global',
            'consolecommand' => 'Comando de console',
            'command' => 'Comando',
            'ban' => 'Banir',
            'reason' => 'Motivo',
            'duration' => 'Duração (dias)',
            'mute' => 'Silenciar',
            'unban' => 'Desbanir',
            'unmute' => 'Remover silenciamento',
            'teleport' => 'Teleportar',
            'kickuser' => 'Expulsar usuário',
            'Kill' => 'Matar',
            ////////////////////////////////////////////Sidebar/////////////////////////////////////////////////////
            'home' => 'Página inicial',
            'dashboard' => 'Painel',
            'objects' => 'Objetos',
            'events' => 'Eventos',
            'quests' => 'Missões',
            'logs' => 'Registros',
            'adminaccounts' => 'Contas de administrador',
            'config' => 'Configuração',
            'maps' => 'Mapas',
            ///////////////////////////////////////Shop Admin/////////////////////////////////////////////////////
            'price' => 'Preço',
            'products' => 'Produtos',
            'description' => 'Descrição',
            'action' => 'Ação',
            'productpic' => 'Imagem do produto',
            'addproduct' => 'Adicionar produto',
            'editproduct' => 'Editar produto',
            'edit' => 'Editar',
            /////////////////////////////////////News Admin//////////////////////////////////////////////////////
            'addnews' => 'Adicionar notícia',
            'title' => 'Título',
            'textnews' => 'Texto da notícia',
            'newspic' => 'Imagem da notícia',
            'uploadnews' => 'Carregar notícia',
            'date' => 'Data',
            ////////////////////////////////////Objects Admin////////////////////////////////////////////////////
            'key' => 'Chave',
            ///////////////////////////////////////Logs/////////////////////////////////////////////////////////
            'admin' => 'Administrador',
            'logs' => 'Registros',
            //////////////////////////////////////Admin Accounts////////////////////////////////////////////////
            'addadminaccount' => 'Adicionar conta de administrador',
            /////////////////////////////////////Config/////////////////////////////////////////////////////////
            'gradient' => 'Cores de gradiente',
            'analytics' => 'Google Analytics',
            'configdownloadbutton' => 'Botão de download',
            'activate' => 'Ativar',
            'deactivate' => 'Desativar',
            'changelegal' => 'Alterar aviso legal',
            'changeterms' => 'Alterar termos',
            'changeprivacity' => 'Alterar privacidade',
            'editmenus' => 'Editar menus',
            'change' => 'Alterar',
            /////////////////////////////////////Edit Legal////////////////////////////////////////////////////
            'editlegal' => 'Editar aviso legal',
            'textlegal' => 'Texto legal',
            ////////////////////////////////////Edit Terms////////////////////////////////////////////////////
            'editterms' => 'Editar termos e condições',
            'textterms' => 'Texto dos termos e condições',
            ///////////////////////////////////Edit Privacity////////////////////////////////////////////////
            'editprivacity' => 'Editar privacidade',
            'textprivacity' => 'Texto de privacidade',
            ////////////////////////////////////Edit Menus//////////////////////////////////////////////////
            'iconlist' => 'Lista de ícones',
            'descriptionmenu' => 'Descrição do menu',
            'iconmenu1' => 'Ícone do menu 1',
            'iconmenu2' => 'Ícone do menu 2',
            'iconmenu3' => 'Ícone do menu 3',
            'titlemenu1' => 'Título do menu 1',
            'titlemenu2' => 'Título do menu 2',
            'titlemenu2' => 'Título do menu 3',
            'textmenu1' => 'Texto do menu 1',
            'textmenu2' => 'Texto do menu 2',
            'textmenu3' => 'Texto do menu 3',
            /////////////////////////////////Edit Lang////////////////////////////////////////////////////
            'editlang' => 'Editar idioma',
            'chooselang' => 'Escolher idioma',
             ////////////////////////////////Data Tables/////////////////////////////////////////////////
             'search' => 'Buscar',
             'emptyTable' => 'Nenhum dado disponível',
             'infotable' => 'Mostrando de _START_ a _END_ de _TOTAL_ entradas',
             'infoEmpty' => 'Mostrando 0 a 0 de 0 entradas',
             'infoFiltered' => '(filtrado de um total de _MAX_ entradas)',
             'lengthMenu' => 'Mostrar _MENU_ entradas',
             'loadingRecords' => 'Carregando...',
             'processing' => 'Processando...',
             'zeroRecords' => 'Nenhum registro encontrado',
             'first' => 'Primeiro',
             'last' => 'Último',
             'next' => 'Próximo',
             'previous' => 'Anterior',
             /////////////////////////////////Panel User///////////////////////////////////////////////////
             'paneluser' => 'Painel do usuário',
             'recharge' => 'Recarregar',
             'reset' => 'Redefinir',
             'player' => 'Jogador',
             'createticket' => 'Criar ticket',
             'tickettext' => 'Texto do ticket',
             'addticket' => 'Enviar ticket',
             'chooseticket' => 'Escolher tipo de ticket',
             'feedback' => 'Feedback',
             'tickets' => 'Tickets',
             'available' => 'Disponível',
             'updates' => 'Atualizações',
             'about' => 'Sobre',
             'balanceavailable' => 'Saldo disponível',
             'confirmnewpassword' => 'Confirmar nova senha',
             'newpassword' => 'Nova senha',
             'oldpassword' => 'Senha atual',
             'browser' => 'Navegador',
             'changepassword' => 'Alterar senha',
             'rechargeok' => 'Pagamento concluído com sucesso',
             
        );











        $hi = array(
            ////////////////////////////////////////////Home////////////////////////////////////////////////////////
            'downloadbutton' => 'डाउनलोड',
            'onlineplayers' => 'ऑनलाइन खिलाड़ी',
            'listusers' => 'उपयोगकर्ता सूचीकरण',
            'listplayers' => 'खिलाड़ी सूचीकरण',
            'shop' => 'दुकान',
            'news' => 'समाचार',
            'register' => 'रजिस्टर करें',
            'password' => 'पासवर्ड',
            'confirmpassword' => 'पासवर्ड की पुष्टि करें',
            'email' => 'ईमेल',
            'forgotpassword' => 'क्या आपने अपना पासवर्ड भूल गए हैं?',
            'login' => 'लॉगिन',
            'statistics' => 'आँकड़े',
            'onlinetime' => 'ऑनलाइन समय',
            'useronline' => 'ऑनलाइन उपयोगकर्ता',
            'usersregistered' => 'रजिस्टर उपयोगकर्ता',
            'features' => 'विशेषताएँ',
            'copyright' => 'कॉपीराइट',
            'legalnotice' => 'कानूनी नोटिस',
            'terms' => 'नियम और शर्तें',
            'privacity' => 'गोपनीयता',
            'disconnect' => 'डिस्कनेक्ट',
            'administrativepanel' => 'प्रशासनिक पैनल',
            'name' => 'नाम',
            'language' => 'भाषा',
            ////////////////////////////////////////////Players Online////////////////////////////////////////////////////////
            'class' => 'क्लास',
            'gender' => 'लिंग',
            'exp' => 'अनुभव',
            'map' => 'नक्शा',
            ////////////////////////////////////////////Users////////////////////////////////////////////////////////
            'timeplayed' => 'खेला गया समय',
            'banned' => 'प्रतिबंधित',
            'muted' => 'म्यूटेड',
            ////////////////////////////////////////////Players////////////////////////////////////////////////////////
            'level' => 'स्तर',
            'status' => 'स्थिति',
            ////////////////////////////////////////////Shop////////////////////////////////////////////////////////
            'productdetail' => 'उत्पाद विवरण',
            'atackan' => 'हमला एनिमेशन',
            'interacan' => 'इंटरएक्शन एनिमेशन',
            'return' => 'वापसी',
            'buy' => 'खरीदें',
            'paymentmethod' => 'भुगतान का तरीका',
            ////////////////////////////////////////////News////////////////////////////////////////////////////////
            'lastnews' => 'आखिरी खबर',
            'writedby' => 'लिखा गया है',
            ////////////////////////////////////////////Mant////////////////////////////////////////////////////////
            'maintenance' => 'रखरखाव',
            'maintenancemessage' => 'नमस्ते, हम अभी रखरखाव में हैं। जल्द ही हम वापस आएंगे',
            'maintenanceenter' => 'व्यवस्थापक के रूप में लॉगिन करें',
            'enter' => 'लॉगिन',
            'user' => 'उपयोगकर्ता',
            /////////////////////////////////////////////Recover////////////////////////////////////////////////////
            'recoverpassword' => 'पासवर्ड दobévelopperPlugin करें',
            'recover' => 'दोबारा प्राप्त करें',
            ////////////////////////////////////////////Dashboard///////////////////////////////////////////////////
            'totalplayers' => 'कुल खिलाड़ी',
            'cps' => 'सीपीएस सर्वर',
            'directmessage' => 'सीधा संदेश',
            'userorplayer' => 'उपयोगकर्ता या खिलाड़ी',
            'message' => 'संदेश',
            'mapmessage' => 'नक्शा संदेश',
            'mapid' => 'नक्शा आईडी',
            'globalmessage' => 'वैश्विक संदेश',
            'consolecommand' => 'कंसोल कमांड',
            'command' => 'कमांड',
            'ban' => 'प्रतिबंधित',
            'reason' => 'कारण',
            'duration' => 'अवधि (दिन)',
            'mute' => 'म्यूट',
            'unban' => 'प्रतिबंध हटाना',
            'unmute' => 'म्यूट हटाना',
            'teleport' => 'टेलीपोर्ट',
            'kickuser' => 'उपयोगकर्ता को निकालें',
            'Kill' => 'मार',
            ////////////////////////////////////////////Sidebar/////////////////////////////////////////////////////
            'home' => 'होम',
            'dashboard' => 'डैशबोर्ड',
            'objects' => 'ऑब्जेक्ट्स',
            'events' => 'आयोजन',
            'quests' => 'क्वेस्ट्स',
            'logs' => 'लॉग्स',
            'adminaccounts' => 'व्यवस्थापक खाते',
            'config' => 'कॉन्फ़िगरेशन',
            'maps' => 'नक्शे',
            ///////////////////////////////////////Shop Admin/////////////////////////////////////////////////////
            'price' => 'मूल्य',
            'products' => 'उत्पाद',
            'description' => 'विवरण',
            'action' => 'क्रिया',
            'productpic' => 'उत्पाद चित्र',
            'addproduct' => 'उत्पाद जोड़ें',
            'editproduct' => 'उत्पाद संपादित करें',
            'edit' => 'संपादित करें',
            /////////////////////////////////////News Admin//////////////////////////////////////////////////////
            'addnews' => 'समाचार जोड़ें',
            'title' => 'शीर्षक',
            'textnews' => 'समाचार टेक्स्ट',
            'newspic' => 'समाचार चित्र',
            'uploadnews' => 'समाचार अपलोड करें',
            'date' => 'तारीख',
            ////////////////////////////////////Objects Admin////////////////////////////////////////////////////
            'key' => 'कुंजी',
            ///////////////////////////////////////Logs/////////////////////////////////////////////////////////
            'admin' => 'व्यवस्थापक',
            'logs' => 'लॉग्स',
            //////////////////////////////////////Admin Accounts////////////////////////////////////////////////
            'addadminaccount' => 'व्यवस्थापक खाता जोड़ें',
            /////////////////////////////////////Config/////////////////////////////////////////////////////////
            'gradient' => 'ग्रेडिएंट रंग',
            'analytics' => 'गूगल विश्लेषिकी',
            'configdownloadbutton' => 'डाउनलोड बटन',
            'activate' => 'सक्रिय करें',
            'deactivate' => 'निष्क्रिय करें',
            'changelegal' => 'कानूनी बदलें',
            'changeterms' => 'नियम बदलें',
            'changeprivacity' => 'गोपनीयता बदलें',
            'editmenus' => 'मेनू संपादित करें',
            'change' => 'बदलें',
            /////////////////////////////////////Edit Legal////////////////////////////////////////////////////
            'editlegal' => 'कानूनी संपादित करें',
            'textlegal' => 'कानूनी टेक्स्ट',
            ////////////////////////////////////Edit Terms////////////////////////////////////////////////////
            'editterms' => 'नियम और शर्तों को संपादित करें',
            'textterms' => 'नियम और शर्तें का टेक्स्ट',
            ///////////////////////////////////Edit Privacity////////////////////////////////////////////////
            'editprivacity' => 'गोपनीयता संपादित करें',
            'textprivacity' => 'गोपनीयता का टेक्स्ट',
            ////////////////////////////////////Edit Menus//////////////////////////////////////////////////
            'iconlist' => 'आइकन सूची',
            'descriptionmenu' => 'मेनू का विवरण',
            'iconmenu1' => 'आइकन मेनू 1',
            'iconmenu2' => 'आइकन मेनू 2',
            'iconmenu3' => 'आइकन मेनू 3',
            'titlemenu1' => 'टाइटल मेनू 1',
            'titlemenu2' => 'टाइटल मेनू 2',
            'titlemenu2' => 'टाइटल मेनू 3',
            'textmenu1' => 'मेनू 1 का टेक्स्ट',
            'textmenu2' => 'मेनू 2 का टेक्स्ट',
            'textmenu3' => 'मेनू 3 का टेक्स्ट',
            /////////////////////////////////Edit Lang////////////////////////////////////////////////////
            'editlang' => 'भाषा संपादित करें',
            'chooselang' => 'भाषा चुनें',
             ////////////////////////////////Data Tables/////////////////////////////////////////////////
             'search' => 'खोजें',
             'emptyTable' => 'कोई जानकारी नहीं है',
             'infotable' => '_START_ से _END_ के बीच _TOTAL_ प्रविष्टियां दिखा रहा है',
             'infoEmpty' => '0 से 0 तक 0 प्रविष्टियां दिखा रहा है',
             'infoFiltered' => '(_MAX_ कुल प्रविष्टियों की फ़िल्टर की गई)',
             'lengthMenu' => '_MENU_ प्रविष्टियां दिखाएं',
             'loadingRecords' => 'लोड हो रहा है...',
             'processing' => 'प्रोसेसिंग...',
             'zeroRecords' => 'कोई परिणाम नहीं मिले',
             'first' => 'पहला',
             'last' => 'आखिरी',
             'next' => 'अगला',
             'previous' => 'पिछला',
             /////////////////////////////////Panel User///////////////////////////////////////////////////
             'paneluser' => 'उपयोगकर्ता पैनल',
             'recharge' => 'रिचार्ज',
             'reset' => 'रीसेट',
             'player' => 'खिलाड़ी',
             'createticket' => 'टिकट बनाएं',
             'tickettext' => 'टिकट का टेक्स्ट',
             'addticket' => 'टिकट भेजें',
             'chooseticket' => 'टिकट का प्रकार चुनें',
             'feedback' => 'प्रतिसाद',
             'tickets' => 'टिकट',
             'available' => 'उपलब्ध',
             'updates' => 'अपडेट',
             'about' => 'के बारे में',
             'balanceavailable' => 'उपलब्ध संतुलन',
             'confirmnewpassword' => 'नई पासवर्ड की पुष्टि करें',
             'newpassword' => 'नया पासवर्ड',
             'oldpassword' => 'पुराना पासवर्ड',
             'browser' => 'ब्राउज़र',
             'changepassword' => 'पासवर्ड बदलें',
             'rechargeok' => 'सफलता पूर्वक पेमेंट हो गई है',
        );









        $ar = array(
            ////////////////////////////////////////////Home////////////////////////////////////////////////////////
            'downloadbutton' => 'Download',
            'onlineplayers' => 'Online-Spieler',
            'listusers' => 'Benutzer auflisten',
            'listplayers' => 'Spieler auflisten',
            'shop' => 'Geschäft',
            'news' => 'Nachrichten',
            'register' => 'Registrieren',
            'password' => 'Passwort',
            'confirmpassword' => 'Passwort bestätigen',
            'email' => 'Email',
            'forgotpassword' => 'Sie haben Ihr Passwort vergessen?',
            'login' => 'Anmeldung',
            'statistics' => 'Statistiken',
            'onlinetime' => 'Online-Zeit',
            'useronline' => 'Benutzer online',
            'usersregistered' => 'Benutzer registriert',
            'features' => 'Merkmale',
            'copyright' => 'Urheberrechte',
            'legalnotice' => 'Impressum',
            'terms' => 'Geschäftsbedingungen',
            'privacity' => 'Datenschutz',
            'disconnect' => 'Trennen',
            'administrativepanel' => 'Verwaltungsbereich',
            'name' => 'Name',
            'language' => 'Sprache',
            ////////////////////////////////////////////Players Online////////////////////////////////////////////////////////
            'class' => 'Class',
            'gender' => 'Gender',
            'exp' => 'Experiencie',
            'map' => 'Map',
            ////////////////////////////////////////////Users////////////////////////////////////////////////////////
            'timeplayed' => 'Time Played',
            'banned' => 'Banned',
            'muted' => 'Muted',
            ////////////////////////////////////////////Players////////////////////////////////////////////////////////
            'level' => 'Level',
            'status' => 'Status',
            ////////////////////////////////////////////Shop////////////////////////////////////////////////////////
            'productdetail' => 'Product Details',
            'atackan' => 'Attack Animation',
            'interacan' => 'Interaction Animation',
            'return' => 'Return',
            'buy' => 'Buy',
            'paymentmethod' => 'Payment Method',
            ////////////////////////////////////////////News////////////////////////////////////////////////////////
            'lastnews' => 'Last News',
            'writedby' => 'Written By',
            ////////////////////////////////////////////Mant////////////////////////////////////////////////////////
            'maintenance' => 'Maintenance',
            'maintenancemessage' => 'Hello, we are in Maintenance. Soon we will be back',
            'maintenanceenter' => 'Login as Admin',
            'enter' => 'Login',
            'user' => 'User',
            /////////////////////////////////////////////Recover////////////////////////////////////////////////////
            'recoverpassword' => 'Recover Password',
            'recover' => 'Recover',
            ////////////////////////////////////////////Dashboard///////////////////////////////////////////////////
            'totalplayers' => 'Total Players',
            'cps' => 'CPS Server',
            'directmessage' => 'Direct Message',
            'userorplayer' => 'User or Plater',
            'message' => 'Message',
            'mapmessage' => 'Map Message',
            'mapid' => 'Map ID',
            'globalmessage' => 'Global Message',
            'consolecommand' => 'Console Command',
            'command' => 'Command',
            'ban' => 'Ban',
            'reason' => 'Reason',
            'duration' => 'Duration (Days)',
            'mute' => 'Mute',
            'unban' => 'Unban',
            'unmute' => 'Unmute',
            'teleport' => 'Teleport',
            'kickuser' => 'Kick User',
            'Kill' => 'Kill',
            ////////////////////////////////////////////Sidebar/////////////////////////////////////////////////////
            'home' => 'Home',
            'dashboard' => 'Dashboard',
            'objects' => 'Objects',
            'events' => 'Events',
            'quests' => 'Quests',
            'logs' => 'Logs',
            'adminaccounts' => 'Admin Accounts',
            'config' => 'Config',
            'maps' => 'Maps',
            ///////////////////////////////////////Shop Admin/////////////////////////////////////////////////////
            'price' => 'Price',
            'products' => 'Products',
            'description' => 'Description',
            'action' => 'Action',
            'productpic' => 'Product Pic',
            'addproduct' => 'Add Product',
            'editproduct' => 'Edit Product',
            'edit' => 'Edit',
            /////////////////////////////////////News Admin//////////////////////////////////////////////////////
            'addnews' => 'Add News',
            'title' => 'Title',
            'textnews' => 'Text News',
            'newspic' => 'News Pic',
            'uploadnews' => 'Upload News',
            'date' => 'Date',
            ////////////////////////////////////Objects Admin////////////////////////////////////////////////////
            'key' => 'Key',
            ///////////////////////////////////////Logs/////////////////////////////////////////////////////////
            'admin' => 'Administrator',
            'logs' => 'Logs',
            //////////////////////////////////////Admin Accounts////////////////////////////////////////////////
            'addadminaccount' => 'Add Admin Account',
            /////////////////////////////////////Config/////////////////////////////////////////////////////////
            'gradient' => 'Gradient Colors',
            'analytics' => 'Google Analytics',
            'configdownloadbutton' => 'Download Button',
            'activate' => 'Activate',
            'deactivate' => 'Deactivate',
            'changelegal' => 'Change Legal',
            'changeterms' => 'Change Terms',
            'changeprivacity' => 'Change Privacity',
            'editmenus' => 'Edit Menus',
            'change' => 'Change',
            /////////////////////////////////////Edit Legal////////////////////////////////////////////////////
            'editlegal' => 'Edit Legal',
            'textlegal' => 'Text Legal',
            ////////////////////////////////////Edit Terms////////////////////////////////////////////////////
            'editterms' => 'Edit Terms and Conditions',
            'textterms' => 'Text Terms and Conditions',
            ///////////////////////////////////Edit Privacity////////////////////////////////////////////////
            'editprivacity' => 'Edit Privacity',
            'textprivacity' => 'Text Privacity',
            ////////////////////////////////////Edit Menus//////////////////////////////////////////////////
            'iconlist' => 'Icon List',
            'descriptionmenu' => 'Description of the Menu',
            'iconmenu1' => 'Icon Menu 1',
            'iconmenu2' => 'Icon Menu 2',
            'iconmenu3' => 'Icon Menu 3',
            'titlemenu1' => 'Title Menu 1',
            'titlemenu2' => 'Title Menu 2',
            'titlemenu2' => 'Title Menu 3',
            'textmenu1' => 'Text Menu 1',
            'textmenu2' => 'Text Menu 2',
            'textmenu3' => 'Text Menu 3',
            /////////////////////////////////Edit Lang////////////////////////////////////////////////////
            'editlang' => 'Sprache bearbeiten',
            'chooselang' => 'Sprache wählen',
             ////////////////////////////////Data Tables/////////////////////////////////////////////////
             'search' => 'Buscar',
             'emptyTable' => 'No hay información',
             'infotable' => 'Mostrando _START_ a _END_ de _TOTAL_ Entradas',
             'infoEmpty' => 'Mostrando 0 to 0 of 0 Entradas',
             'infoFiltered' => '(Filtrado de _MAX_ total entradas)',
             'lengthMenu' => 'Mostrar _MENU_ Entradas',
             'loadingRecords' => 'Cargando...',
             'processing' => 'Procesando...',
             'zeroRecords' => 'Sin resultados encontrados',
             'first' => 'Primero',
             'last' => 'Ultimo',
             'next' => 'Siguiente',
             'previous' => 'Anterior',
             /////////////////////////////////Panel User///////////////////////////////////////////////////
             'paneluser' => 'Panel de Usuario',
             'recharge' => 'Recargar',
             'reset' => 'Resetear',
             'player' => 'Personaje',
             'createticket' => 'Crear Ticket',
             'tickettext' => 'Texto del Ticket',
             'addticket' => 'Enviar Ticket',
             'chooseticket' => 'Elegir Tipo de Ticket',
             'feedback' => 'Feedback',
             'tickets' => 'Tickets',
             'available' => 'Disponible',
             'updates' => 'Updates',
             'about' => 'About',
             'balanceavailable' => 'Saldo Disponible',
             'confirmnewpassword' => 'Confirmar Nueva Contraseña',
             'newpassword' => 'Nueva Contraseña',
             'oldpassword' => 'Contraseña Actual',
             'browser' => 'Navegador',
             'changepassword' => 'Cambiar Contraseña',
             'rechargeok' => 'Pago Completado Con Exito',
             
        );



    $sharedData = $this->getSharedData();

    return array(
        array_merge($es, $sharedData),
        array_merge($en, $sharedData),
        array_merge($tr, $sharedData),
        array_merge($jp, $sharedData),
        array_merge($de, $sharedData),
        array_merge($ru, $sharedData),
        array_merge($zh, $sharedData),
        array_merge($fr, $sharedData),
        array_merge($pt, $sharedData),
        array_merge($hi, $sharedData),
        array_merge($ar, $sharedData),
    );
    }


}
