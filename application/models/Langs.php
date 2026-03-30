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
            'ingameid' => 'Ingame ID',
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
                'ingameid' => 'ID Ingame',
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
                'ingameid' => 'Oyun Ici ID',
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
                'home_default_lead' => 'Qaedah Ù…ÙØªÙˆØ­Ø© Ø§Ù„Ù…ØµØ¯Ø± li ard, tawsi, wa tatbiq mashari a mabniya ala Intersect Engine.',
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
                'modal_login_text' => 'Udkhul ila Ø­Ø³Ø§Ø¨ CMS li idarat al muhtawa wal users wa iidadat al mashru.',
                'modal_register_text' => 'Anshi Ø­Ø³Ø§Ø¨ asasi li mashruik wabda taqyif al CMS ma mujtamaik.',
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

    private function getSharedData()
    {
        $this->load->model('Sitecontext');
        $configRow = $this->Sitecontext->getConfigRow();

        if ($this->session->userdata('lang') == '') {
            $this->session->set_userdata(array(
                'lang' => $configRow['lang'] ?? 'es',
            ));
        }

        $sessionLang = $this->session->userdata('lang') ?: ($configRow['lang'] ?? 'es');
        $rebrandText = $this->getRebrandTextData($sessionLang);

        return $this->Sitecontext->getSharedData(
            $sessionLang,
            $this->session->userdata('user') ?: '',
            (bool) $this->session->userdata('login'),
            (int) $this->session->userdata('rol'),
            $rebrandText
        );
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
            'password' => 'ContraseÃ±a',
            'confirmpassword' => 'Confirmar ContraseÃ±a',
            'email' => 'Correo',
            'forgotpassword' => 'Se Olvido de su ContraseÃ±a?',
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
            'atackan' => 'AnimaciÃ³n de Ataque',
            'interacan' => 'AnimaciÃ³n de InteracciÃ³n',
            'ingameid' => 'ID Ingame',
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
            'recoverpassword' => 'Recuperar ContraseÃ±a',
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
            'config' => 'ConfiguraciÃ³n',
            'maps' => 'Mapas',
            ///////////////////////////////////////Shop Admin/////////////////////////////////////////////////////
            'price' => 'Precio',
            'products' => 'Productos',
            'description' => 'DescripciÃ³n',
            'action' => 'AcciÃ³n',
            'productpic' => 'Foto del Producto',
            'addproduct' => 'AÃ±adir Producto',
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
            'emptyTable' => 'No hay informaciÃ³n',
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
            'confirmnewpassword' => 'Confirmar Nueva ContraseÃ±a',
            'newpassword' => 'Nueva ContraseÃ±a',
            'oldpassword' => 'ContraseÃ±a Actual',
            'browser' => 'Navegador',
            'changepassword' => 'Cambiar ContraseÃ±a',
            'rechargeok' => 'Pago Completado Con Exito',
            ///////////////////////////////////0.7//////////////////////////////////////////////////////
            'commands' => 'Comandos',
            'hdd' => 'HDD',
            'cpu' => 'CPU',
            'ram' => 'RAM',
            'version' => 'VersiÃ³n Local',
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
            'downloadbutton' => 'Ä°ndir',
            'onlineplayers' => 'Ã‡evrimiÃ§i Oyuncular',
            'listusers' => 'KullanÄ±cÄ± Listesi',
            'listplayers' => 'Oyuncu Listesi',
            'shop' => 'Market',
            'news' => 'Haberler',
            'register' => 'KayÄ±t',
            'password' => 'Åžifre',
            'confirmpassword' => 'Åžifreyi Onayla',
            'email' => 'Mail Adresi',
            'forgotpassword' => 'ParolanÄ±zÄ± mÄ± unuttunuz?',
            'login' => 'GiriÅŸ',
            'statistics' => 'Ä°statistikler',
            'onlinetime' => 'Ã‡evrimiÃ§i Zaman',
            'useronline' => 'Ã‡evrimiÃ§i Oyuncular',
            'usersregistered' => 'KayÄ±tlÄ± KullanÄ±cÄ±lar',
            'features' => 'Ã–zellikler',
            'copyright' => 'Telif HakkÄ±',
            'legalnotice' => 'Yasal UyarÄ±',
            'terms' => 'Åžartlar ve KoÅŸullar',
            'privacity' => 'Gizlilik',
            'disconnect' => 'Oturumu Kapat',
            'administrativepanel' => 'YÃ¶netici Paneli',
            'name' => 'Ä°sim',
            'language' => 'Dil',
            ////////////////////////////////////////////Players Online////////////////////////////////////////////////////////
            'class' => 'SÄ±nÄ±f',
            'gender' => 'Cinsiyet',
            'exp' => 'TecrÃ¼be PuanÄ±',
            'map' => 'Harita',
            ////////////////////////////////////////////Users////////////////////////////////////////////////////////
            'timeplayed' => 'Oynama SÃ¼resi',
            'banned' => 'BanlÄ±',
            'muted' => 'SusturulmuÅŸ',
            ////////////////////////////////////////////Players////////////////////////////////////////////////////////
            'level' => 'Seviye',
            'status' => 'Durum',
            ////////////////////////////////////////////Shop////////////////////////////////////////////////////////
            'productdetail' => 'ÃœrÃ¼n DetaylarÄ±',
            'atackan' => 'SaldÄ±rÄ± Animasyonu',
            'interacan' => 'EtkileÅŸim Animasyonu',
            'return' => 'Geri DÃ¶n',
            'buy' => 'SatÄ±n Al',
            'paymentmethod' => 'Ã–deme YÃ¶ntemi',
            ////////////////////////////////////////////News////////////////////////////////////////////////////////
            'lastnews' => 'Son Haberler',
            'writedby' => 'tarafÄ±ndan yazÄ±lmÄ±ÅŸtÄ±r',
            ////////////////////////////////////////////News////////////////////////////////////////////////////////
            'maintenance' => 'BakÄ±m & OnarÄ±m',
            'maintenancemessage' => 'Merhaba, BakÄ±mdayÄ±z. YakÄ±nda geri dÃ¶neceÄŸiz',
            'maintenanceenter' => 'YÃ¶netici olarak giriÅŸ yapÄ±n',
            'enter' => 'GiriÅŸ',
            'user' => 'KullanÄ±cÄ±',
            /////////////////////////////////////////////Recover////////////////////////////////////////////////////
            'recoverpassword' => 'Åžifre Kurtarma',
            'recover' => 'Geri Al',
            ////////////////////////////////////////////Dashboard///////////////////////////////////////////////////
            'totalplayers' => 'Toplam Oyuncu',
            'cps' => 'CPS Sunucusu',
            'directmessage' => 'Direk Mesaj',
            'userorplayer' => 'KullanÄ±cÄ± veya Karakter',
            'message' => 'Mesaj',
            'mapmessage' => 'Haritaya Mesaj',
            'mapid' => 'Harita ID',
            'globalmessage' => 'KÃ¼resel Mesaj',
            'consolecommand' => 'Konsol Komutu',
            'command' => 'Komut',
            'ban' => 'Yasaklama',
            'reason' => 'Sebep',
            'duration' => 'SÃ¼re (GÃ¼n)',
            'mute' => 'Susturma',
            'unban' => 'Yasaklama KaldÄ±rma',
            'unmute' => 'Susturma KaldÄ±rma',
            'teleport' => 'IÅŸÄ±nlanma',
            'kickuser' => 'KullanÄ±cÄ±yÄ± At',
            'Kill' => 'Ã–ldÃ¼r',
            ////////////////////////////////////////////Sidebar/////////////////////////////////////////////////////
            'home' => 'BaÅŸlangÄ±Ã§',
            'dashboard' => 'GÃ¶sterge Paneli',
            'objects' => 'Nesneler',
            'events' => 'Etkinlikler',
            'quests' => 'GÃ¶revler',
            'logs' => 'KayÄ±tlar',
            'adminaccounts' => 'YÃ¶netici HesaplarÄ±',
            'config' => 'Ayarlar',
            'maps' => 'Mapler',
            ///////////////////////////////////////Shop Admin/////////////////////////////////////////////////////
            'price' => 'Fiyat',
            'products' => 'ÃœrÃ¼nler',
            'description' => 'AÃ§Ä±klama',
            'action' => 'Eylem',
            'productpic' => 'ÃœrÃ¼n FotoÄŸrafÄ±',
            'addproduct' => 'ÃœrÃ¼n Ekle',
            'editproduct' => 'ÃœrÃ¼n DÃ¼zenle',
            'edit' => 'DÃ¼zenle',
            /////////////////////////////////////News Admin//////////////////////////////////////////////////////
            'addnews' => 'Yeni Haber OluÅŸtur',
            'title' => 'BaÅŸlÄ±k',
            'textnews' => 'Haber Metni',
            'newspic' => 'Haber FotoÄŸrafÄ±',
            'uploadnews' => 'Haber YÃ¼kle',
            'date' => 'Tarih',
            ////////////////////////////////////Objects Admin////////////////////////////////////////////////////
            'key' => 'Anahtar',
            ///////////////////////////////////////Logs/////////////////////////////////////////////////////////
            'admin' => 'YÃ¶netici',
            'logs' => 'KayÄ±tlar',
            //////////////////////////////////////Admin Accounts////////////////////////////////////////////////
            'addadminaccount' => 'YÃ¶netici HesabÄ± Ekle',
            /////////////////////////////////////Config/////////////////////////////////////////////////////////
            'gradient' => 'Gradyan Renkleri',
            'analytics' => 'Google Analytics',
            'configdownloadbutton' => 'Ä°ndirme Butonu',
            'activate' => 'EtkinleÅŸtir',
            'deactivate' => 'Devre DÄ±ÅŸÄ± BÄ±rak',
            'changelegal' => 'YasalÄ± DeÄŸiÅŸtir',
            'changeterms' => 'ÅžartlarÄ± DeÄŸiÅŸtir',
            'changeprivacity' => 'GizliliÄŸi DeÄŸiÅŸtir',
            'editmenus' => 'MenÃ¼leri DÃ¼zenle',
            'change' => 'DeÄŸiÅŸtir',
            /////////////////////////////////////Edit Legal////////////////////////////////////////////////////
            'editlegal' => 'YasalÄ± DÃ¼zenle',
            'textlegal' => 'Yasal Metni',
            ////////////////////////////////////Edit Terms////////////////////////////////////////////////////
            'editterms' => 'KoÅŸullarÄ± ve ÅžartlarÄ± DÃ¼zenle',
            'textterms' => 'KoÅŸullar ve Åžartlar Metni',
            ///////////////////////////////////Edit Privacity////////////////////////////////////////////////
            'editprivacity' => 'GizliliÄŸi DÃ¼zenle',
            'textprivacity' => 'Gizlilik Metni',
            ////////////////////////////////////Edit Menus//////////////////////////////////////////////////
            'iconlist' => 'Simge Listesi',
            'descriptionmenu' => 'AÃ§Ä±klama MenÃ¼sÃ¼',
            'iconmenu1' => 'Simge MenÃ¼sÃ¼ 1',
            'iconmenu2' => 'Simge MenÃ¼sÃ¼ 2',
            'iconmenu3' => 'Simge MenÃ¼sÃ¼ 3',
            'titlemenu1' => 'BaÅŸlÄ±k MenÃ¼sÃ¼ 1',
            'titlemenu2' => 'BaÅŸlÄ±k MenÃ¼sÃ¼ 2',
            'titlemenu2' => 'BaÅŸlÄ±k MenÃ¼sÃ¼ 3',
            'textmenu1' => 'Metin MenÃ¼sÃ¼ 1',
            'textmenu2' => 'Metin MenÃ¼sÃ¼ 2',
            'textmenu3' => 'Metin MenÃ¼sÃ¼ 3',
            /////////////////////////////////Edit Lang////////////////////////////////////////////////////
            'editlang' => 'Dili DÃ¼zenle',
            'chooselang' => 'Dil seÃ§iniz',
             ////////////////////////////////Data Tables/////////////////////////////////////////////////
             'search' => 'Arama',
             'emptyTable' => 'Bilgi yok',
             'infotable' => '_TOTAL_ GiriÅŸten _START_ - _END_ ArasÄ± gÃ¶steriliyor',
             'infoEmpty' => '0 GiriÅŸten 0 ile 0 arasÄ± gÃ¶steriliyor',
             'infoFiltered' => '(Filtrado de _MAX_ total entradas)',
             'lengthMenu' => 'Toplam _MENU_ giriÅŸin filtrelenmesi',
             'loadingRecords' => 'Doluyor...',
             'processing' => 'IÅŸleme...',
             'zeroRecords' => 'SonuÃ§ bulunamadÄ±',
             'first' => 'Ã–ncelikle',
             'last' => 'En sonuncu',
             'next' => 'Takip etmek',
             'previous' => 'Anterior',
             /////////////////////////////////Panel User///////////////////////////////////////////////////
             'paneluser' => 'KullanÄ±cÄ± Kontrol Paneli',
             'recharge' => 'ÅŸarj',
             'reset' => 'SÄ±fÄ±rlamak',
             'player' => 'Karakter',
             'createticket' => 'Bilet OluÅŸtur',
             'tickettext' => 'Bilet Metni',
             'addticket' => 'Bilet GÃ¶nder',
             'chooseticket' => 'Bilet TÃ¼rÃ¼nÃ¼ SeÃ§in',
             'feedback' => 'Geri bildirim',
             'tickets' => 'Biletler',
             'available' => 'Mevcut',
             'updates' => 'GÃ¼ncelleme',
             'about' => 'HakkÄ±nda',
             'balanceavailable' => 'Kalan bakiye',
             'confirmnewpassword' => 'Yeni ÅŸifreyi onayla',
             'newpassword' => 'Yeni Åžifre',
             'oldpassword' => 'Eski Åžifre',
             'browser' => 'TarayÄ±cÄ±',
             'changepassword' => 'Åžifreyi DeÄŸiÅŸtir',
             'rechargeok' => 'Ã–deme BaÅŸarÄ±yla TamamlandÄ±',
            ///////////////////////////////////0.7//////////////////////////////////////////////////////
            'commands' => 'Komutlar',
            'hdd' => 'HDD',
            'cpu' => 'Ä°ÅŸlemci',
            'ram' => 'RAM',
            'version' => 'Yerel SÃ¼rÃ¼m',
            'id' => 'Ä°D',
            ////////////////////////////////////0.8////////////////////////////////////////////////////
           'changelog' => 'DeÄŸiÅŸiklik gÃ¼nlÃ¼ÄŸÃ¼',
           'addchangelog' => 'DeÄŸiÅŸiklik GÃ¼nlÃ¼ÄŸÃ¼ OluÅŸtur',
             

           );
   
           

























           $jp = array(
            ////////////////////////////////////////////Home////////////////////////////////////////////////////////
            'downloadbutton' => 'ãƒ€ã‚¦ãƒ³ãƒ­ãƒ¼ãƒ‰',
            'onlineplayers' => 'ã‚ªãƒ³ãƒ©ã‚¤ãƒ³ãƒ—ãƒ¬ãƒ¼ãƒ¤ãƒ¼',
            'listusers' => 'ãƒ¦ãƒ¼ã‚¶ãƒ¼ã®ãƒªã‚¹ãƒˆ',
            'listplayers' => 'ãƒ—ãƒ¬ãƒ¼ãƒ¤ãƒ¼ã®ãƒªã‚¹ãƒˆ',
            'shop' => 'åº—',
            'news' => 'ãƒ‹ãƒ¥ãƒ¼ã‚¹',
            'register' => 'ç™»éŒ²',
            'password' => 'ãƒ‘ã‚¹ãƒ¯ãƒ¼ãƒ‰',
            'confirmpassword' => 'ãƒ‘ã‚¹ãƒ¯ãƒ¼ãƒ‰ã‚’èªè¨¼ã™ã‚‹',
            'email' => 'Eãƒ¡ãƒ¼ãƒ«',
            'forgotpassword' => 'ãƒ‘ã‚¹ãƒ¯ãƒ¼ãƒ‰ã‚’å¿˜ã‚Œã¾ã—ãŸã‹ï¼Ÿ',
            'login' => 'ãƒ­ã‚°ã‚¤ãƒ³',
            'statistics' => 'çµ±è¨ˆå­¦',
            'onlinetime' => 'ã‚ªãƒ³ãƒ©ã‚¤ãƒ³æ™‚é–“',
            'useronline' => 'ã‚ªãƒ³ãƒ©ã‚¤ãƒ³ãƒ¦ãƒ¼ã‚¶ãƒ¼',
            'usersregistered' => 'ç™»éŒ²ãƒ¦ãƒ¼ã‚¶ãƒ¼',
            'features' => 'ç‰¹å¾´',
            'copyright' => 'è‘—ä½œæ¨©',
            'legalnotice' => 'æ³•çš„é€šçŸ¥',
            'terms' => 'è¦ç´„ã¨æ¡ä»¶',
            'privacity' => 'ãƒ—ãƒ©ã‚¤ãƒã‚·ãƒ¼',
            'disconnect' => 'åˆ‡æ–­ã™ã‚‹',
            'administrativepanel' => 'ç®¡ç†ãƒ‘ãƒãƒ«',
            'name' => 'åå‰',
            'language' => 'è¨€èªž',
            ////////////////////////////////////////////Players Online////////////////////////////////////////////////////////
            'class' => 'ã‚¯ãƒ©ã‚¹',
            'gender' => 'æ€§åˆ¥',
            'exp' => 'çµŒé¨“',
            'map' => 'åœ°å›³',
            ////////////////////////////////////////////Users////////////////////////////////////////////////////////
            'timeplayed' => 'ãƒ—ãƒ¬ã‚¤æ™‚é–“',
            'banned' => 'ç¦æ­¢ã•ã‚ŒãŸ',
            'muted' => 'ãƒŸãƒ¥ãƒ¼ãƒˆ',
            ////////////////////////////////////////////Players////////////////////////////////////////////////////////
            'level' => 'ãƒ¬ãƒ™ãƒ«',
            'status' => 'çŠ¶æ…‹',
            ////////////////////////////////////////////Shop////////////////////////////////////////////////////////
            'productdetail' => 'è£½å“è©³ç´°',
            'atackan' => 'æ”»æ’ƒã‚¢ãƒ‹ãƒ¡ãƒ¼ã‚·ãƒ§ãƒ³',
            'interacan' => 'ã‚¤ãƒ³ã‚¿ãƒ©ã‚¯ã‚·ãƒ§ãƒ³ã‚¢ãƒ‹ãƒ¡ãƒ¼ã‚·ãƒ§ãƒ³',
            'return' => 'æˆ»ã‚‹',
            'buy' => 'è²·ã†',
            'paymentmethod' => 'æ”¯æ‰•æ–¹æ³•',
            ////////////////////////////////////////////News////////////////////////////////////////////////////////
            'lastnews' => 'æœ€å¾Œã®ãƒ‹ãƒ¥ãƒ¼ã‚¹',
            'writedby' => 'ã«ã‚ˆã£ã¦æ›¸ã‹ã‚ŒãŸ',
            ////////////////////////////////////////////Mant////////////////////////////////////////////////////////
            'maintenance' => 'ãƒ¡ãƒ³ãƒ†ãƒŠãƒ³ã‚¹',
            'maintenancemessage' => 'ã“ã‚“ã«ã¡ã¯ã€ãƒ¡ãƒ³ãƒ†ãƒŠãƒ³ã‚¹ä¸­ã§ã™ã€‚ã™ãã«æˆ»ã£ã¦ãã¾ã™',
            'maintenanceenter' => 'ç®¡ç†è€…ã¨ã—ã¦ãƒ­ã‚°ã‚¤ãƒ³',
            'enter' => 'ãƒ­ã‚°ã‚¤ãƒ³',
            'user' => 'ãƒ¦ãƒ¼ã‚¶ãƒ¼',
            /////////////////////////////////////////////Recover////////////////////////////////////////////////////
            'recoverpassword' => 'ãƒ‘ã‚¹ãƒ¯ãƒ¼ãƒ‰å¾©æ—§',
            'recover' => 'å›žå¾©',
            ////////////////////////////////////////////Dashboard///////////////////////////////////////////////////
            'totalplayers' => 'ç·ãƒ—ãƒ¬ã‚¤ãƒ¤ãƒ¼æ•°',
            'cps' => 'CPSã‚µãƒ¼ãƒãƒ¼',
            'directmessage' => 'ãƒ€ã‚¤ãƒ¬ã‚¯ãƒˆãƒ¡ãƒƒã‚»ãƒ¼ã‚¸',
            'userorplayer' => 'ãƒ¦ãƒ¼ã‚¶ãƒ¼ã¾ãŸã¯ãƒ—ãƒ¬ãƒ¼ãƒ¤ãƒ¼',
            'message' => 'ãƒ¡ãƒƒã‚»ãƒ¼ã‚¸',
            'mapmessage' => 'ãƒžãƒƒãƒ—ãƒ¡ãƒƒã‚»ãƒ¼ã‚¸',
            'mapid' => 'ãƒžãƒƒãƒ—ID',
            'globalmessage' => 'ã‚°ãƒ­ãƒ¼ãƒãƒ«ãƒ¡ãƒƒã‚»ãƒ¼ã‚¸',
            'consolecommand' => 'ã‚³ãƒ³ã‚½ãƒ¼ãƒ«ã‚³ãƒžãƒ³ãƒ‰',
            'command' => 'æŒ‡ç¤º',
            'ban' => 'ç¦æ­¢',
            'reason' => 'ç†ç”±',
            'duration' => 'æœŸé–“ï¼ˆæ—¥ï¼‰',
            'mute' => 'ãƒŸãƒ¥ãƒ¼ãƒˆ',
            'unban' => 'ç¦æ­¢ã‚’è§£é™¤ã™ã‚‹',
            'unmute' => 'ãƒŸãƒ¥ãƒ¼ãƒˆã‚’è§£é™¤ã™ã‚‹',
            'teleport' => 'ãƒ†ãƒ¬ãƒãƒ¼ãƒˆ',
            'kickuser' => 'ã‚­ãƒƒã‚¯ãƒ¦ãƒ¼ã‚¶ãƒ¼',
            'Kill' => 'æ®ºã™',
            ////////////////////////////////////////////Sidebar/////////////////////////////////////////////////////
            'home' => 'å®¶',
            'dashboard' => 'ãƒ€ãƒƒã‚·ãƒ¥ãƒœãƒ¼ãƒ‰',
            'objects' => 'ãƒ€ãƒƒã‚·ãƒ¥ãƒœãƒ¼ãƒ‰',
            'events' => 'ã‚¤ãƒ™ãƒ³ãƒˆ',
            'quests' => 'ã‚¯ã‚¨ã‚¹ãƒˆ',
            'logs' => 'ãƒ­ã‚°',
            'adminaccounts' => 'ç®¡ç†è€…ã‚¢ã‚«ã‚¦ãƒ³ãƒˆ',
            'config' => 'æ§‹æˆ',
            'maps' => 'ãƒžãƒƒãƒ—',
            ///////////////////////////////////////Shop Admin/////////////////////////////////////////////////////
            'price' => 'ä¾¡æ ¼',
            'products' => 'è£½å“',
            'description' => 'èª¬æ˜Ž',
            'action' => 'ã‚¢ã‚¯ã‚·ãƒ§ãƒ³',
            'productpic' => 'è£½å“å†™çœŸ',
            'addproduct' => 'è£½å“ã‚’è¿½åŠ ',
            'editproduct' => 'è£½å“ã®ç·¨é›†',
            'edit' => 'ç·¨é›†',
            /////////////////////////////////////News Admin//////////////////////////////////////////////////////
            'addnews' => 'ãƒ‹ãƒ¥ãƒ¼ã‚¹ã‚’è¿½åŠ ',
            'title' => 'é¡Œå',
            'textnews' => 'ãƒ†ã‚­ã‚¹ãƒˆãƒ‹ãƒ¥ãƒ¼ã‚¹',
            'newspic' => 'ãƒ‹ãƒ¥ãƒ¼ã‚¹å†™çœŸ',
            'uploadnews' => 'ãƒ‹ãƒ¥ãƒ¼ã‚¹ã‚’ã‚¢ãƒƒãƒ—ãƒ­ãƒ¼ãƒ‰',
            'date' => 'æ—¥ã«ã¡',
            ////////////////////////////////////Objects Admin////////////////////////////////////////////////////
            'key' => 'éµ',
            ///////////////////////////////////////Logs/////////////////////////////////////////////////////////
            'admin' => 'ç®¡ç†è€…',
            'logs' => 'ãƒ­ã‚°',
            //////////////////////////////////////Admin Accounts////////////////////////////////////////////////
            'addadminaccount' => 'ç®¡ç†è€…ã‚¢ã‚«ã‚¦ãƒ³ãƒˆã‚’è¿½åŠ ã™ã‚‹',
            /////////////////////////////////////Config/////////////////////////////////////////////////////////
            'gradient' => 'ã‚°ãƒ©ãƒ‡ãƒ¼ã‚·ãƒ§ãƒ³ã‚«ãƒ©ãƒ¼',
            'analytics' => 'ã‚°ãƒ¼ã‚°ãƒ«ã‚¢ãƒŠãƒªãƒ†ã‚£ã‚¯ã‚¹',
            'configdownloadbutton' => 'ãƒ€ã‚¦ãƒ³ãƒ­ãƒ¼ãƒ‰ãƒœã‚¿ãƒ³',
            'activate' => 'æ´»æ€§åŒ–',
            'deactivate' => 'æ´»æ€§åŒ–',
            'changelegal' => 'æ³•æ”¹æ­£',
            'changeterms' => 'æ¡ä»¶ã®å¤‰æ›´',
            'changeprivacity' => 'ãƒ—ãƒ©ã‚¤ãƒã‚·ãƒ¼ã‚’å¤‰æ›´ã™ã‚‹',
            'editmenus' => 'ãƒ¡ãƒ‹ãƒ¥ãƒ¼ã®ç·¨é›†',
            'change' => 'å¤‰åŒ–ã™ã‚‹',
            /////////////////////////////////////Edit Legal////////////////////////////////////////////////////
            'editlegal' => 'æ³•å‹™ã®ç·¨é›†',
            'textlegal' => 'æ³•å‹™ãƒ†ã‚­ã‚¹ãƒˆ',
            ////////////////////////////////////Edit Terms////////////////////////////////////////////////////
            'editterms' => 'åˆ©ç”¨è¦ç´„ã®ç·¨é›†',
            'textterms' => 'ãƒ†ã‚­ã‚¹ãƒˆåˆ©ç”¨è¦ç´„',
            ///////////////////////////////////Edit Privacity////////////////////////////////////////////////
            'editprivacity' => 'ãƒ—ãƒ©ã‚¤ãƒã‚·ãƒ¼ã‚’ç·¨é›†ã™ã‚‹',
            'textprivacity' => 'ãƒ†ã‚­ã‚¹ãƒˆã®ãƒ—ãƒ©ã‚¤ãƒã‚·ãƒ¼',
            ////////////////////////////////////Edit Menus//////////////////////////////////////////////////
            'iconlist' => 'ã‚¢ã‚¤ã‚³ãƒ³ãƒªã‚¹ãƒˆ',
            'descriptionmenu' => 'ãƒ¡ãƒ‹ãƒ¥ãƒ¼ã®èª¬æ˜Ž',
            'iconmenu1' => 'ã‚¢ã‚¤ã‚³ãƒ³ãƒ¡ãƒ‹ãƒ¥ãƒ¼1',
            'iconmenu2' => 'ã‚¢ã‚¤ã‚³ãƒ³ãƒ¡ãƒ‹ãƒ¥ãƒ¼2',
            'iconmenu3' => 'ã‚¢ã‚¤ã‚³ãƒ³ãƒ¡ãƒ‹ãƒ¥ãƒ¼3',
            'titlemenu1' => 'ã‚¿ã‚¤ãƒˆãƒ«ãƒ¡ãƒ‹ãƒ¥ãƒ¼1',
            'titlemenu2' => 'ã‚¿ã‚¤ãƒˆãƒ«ãƒ¡ãƒ‹ãƒ¥ãƒ¼2',
            'titlemenu2' => 'ã‚¿ã‚¤ãƒˆãƒ«ãƒ¡ãƒ‹ãƒ¥ãƒ¼3',
            'textmenu1' => 'ãƒ†ã‚­ã‚¹ãƒˆãƒ¡ãƒ‹ãƒ¥ãƒ¼1',
            'textmenu2' => 'ãƒ†ã‚­ã‚¹ãƒˆãƒ¡ãƒ‹ãƒ¥ãƒ¼2',
            'textmenu3' => 'ãƒ†ã‚­ã‚¹ãƒˆãƒ¡ãƒ‹ãƒ¥ãƒ¼3',
            /////////////////////////////////Edit Lang////////////////////////////////////////////////////
            'editlang' => 'è¨€èªžã®ç·¨é›†',
            'chooselang' => 'è¨€èªžã‚’é¸æŠž',    
             ////////////////////////////////Data Tables/////////////////////////////////////////////////
             'search' => 'æ¤œç´¢',
             'emptyTable' => 'ãƒ‡ãƒ¼ã‚¿ãŒã‚ã‚Šã¾ã›ã‚“',
             'infotable' => 'ã‚¨ãƒ³ãƒˆãƒªã®ã†ã¡ _START_  ã‹ã‚‰ _END_ ã‚’è¡¨ç¤º',
             'infoEmpty' => '0ã‹ã‚‰0ã®ã‚¨ãƒ³ãƒˆãƒªã‚’è¡¨ç¤º',
             'infoFiltered' => '(åˆè¨ˆ _MAX_ ã‚¨ãƒ³ãƒˆãƒªã®ãƒ•ã‚£ãƒ«ã‚¿ãƒªãƒ³ã‚°)',
             'lengthMenu' => ' _MENU_ ã‚¨ãƒ³ãƒˆãƒªã‚’è¡¨ç¤º',
             'loadingRecords' => 'å……é›»...',
             'processing' => 'å‡¦ç†...',
             'zeroRecords' => 'çµæžœãŒè¦‹ã¤ã‹ã‚Šã¾ã›ã‚“',
             'first' => 'åˆã‚',
             'last' => 'æœ€æ–°',
             'next' => 'ç¶šã',
             'previous' => 'å‰',
             /////////////////////////////////Panel User///////////////////////////////////////////////////
             'paneluser' => 'ãƒ¦ãƒ¼ã‚¶ãƒ¼ãƒ€ãƒƒã‚·ãƒ¥ãƒœãƒ¼ãƒ‰',
             'recharge' => 'å……é›»ã™ã‚‹',
             'reset' => 'ãƒªã‚»ãƒƒãƒˆã™ã‚‹ã«ã¯',
             'player' => 'ã‚­ãƒ£ãƒ©ã‚¯ã‚¿ãƒ¼',
             'createticket' => 'ãƒã‚±ãƒƒãƒˆã‚’ä½œæˆã™ã‚‹',
             'tickettext' => 'ãƒã‚±ãƒƒãƒˆãƒ†ã‚­ã‚¹ãƒˆ',
             'addticket' => 'ãƒã‚±ãƒƒãƒˆã‚’é€ä¿¡ã™ã‚‹',
             'chooseticket' => 'ãƒã‚±ãƒƒãƒˆã®ç¨®é¡žã‚’é¸æŠžã—ã¦ãã ã•ã„',
             'feedback' => 'ãƒ•ã‚£ãƒ¼ãƒ‰ãƒãƒƒã‚¯',
             'tickets' => 'åˆ‡ç¬¦å£²å ´',
             'available' => 'åˆ©ç”¨å¯èƒ½',
             'updates' => 'ã‚¢ãƒƒãƒ—ãƒ‡ãƒ¼ãƒˆ',
             'about' => 'ç´„',
             'balanceavailable' => 'åˆ©ç”¨å¯èƒ½æ®‹é«˜',
             'confirmnewpassword' => 'æ–°ã—ã„ãƒ‘ã‚¹ãƒ¯ãƒ¼ãƒ‰ã‚’ç¢ºèª',
             'newpassword' => 'æ–°ã—ã„ãƒ‘ã‚¹ãƒ¯ãƒ¼ãƒ‰',
             'oldpassword' => 'ç¾åœ¨ã®ãƒ‘ã‚¹ãƒ¯ãƒ¼ãƒ‰',
             'browser' => 'ãƒ–ãƒ©ã‚¦ã‚¶',
             'changepassword' => 'ãƒ‘ã‚¹ãƒ¯ãƒ¼ãƒ‰ã‚’å¤‰æ›´ã™ã‚‹',
             'rechargeok' => 'æ”¯æ‰•ã„ãŒæ­£å¸¸ã«å®Œäº†ã—ã¾ã—ãŸ',
            ///////////////////////////////////0.7//////////////////////////////////////////////////////
            'commands' => 'ã‚³ãƒžãƒ³ãƒ‰',
            'hdd' => 'HDD',
            'cpu' => 'CPU',
            'ram' => 'RAM',
            'version' => 'ãƒ­ãƒ¼ã‚«ãƒ«ãƒãƒ¼ã‚¸ãƒ§ãƒ³',
            'id' => 'ID',
            ////////////////////////////////////0.8////////////////////////////////////////////////////
           'changelog' => 'å¤‰æ›´ãƒ­ã‚°',
           'addchangelog' => 'å¤‰æ›´ãƒ­ã‚°ã‚’ä½œæˆã™ã‚‹',
         
           );





























           $de = array(
            ////////////////////////////////////////////Home////////////////////////////////////////////////////////
            'downloadbutton' => 'Download',
            'onlineplayers' => 'Online-Spieler',
            'listusers' => 'Benutzer auflisten',
            'listplayers' => 'Spieler auflisten',
            'shop' => 'GeschÃ¤ft',
            'news' => 'Nachrichten',
            'register' => 'Registrieren',
            'password' => 'Passwort',
            'confirmpassword' => 'Passwort bestÃ¤tigen',
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
            'terms' => 'GeschÃ¤ftsbedingungen',
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
            'return' => 'ZurÃ¼ckkehren',
            'buy' => 'Besorgen',
            'paymentmethod' => 'Zahlungsmethode',
            ////////////////////////////////////////////News////////////////////////////////////////////////////////
            'lastnews' => 'Letzte Nachrichten',
            'writedby' => 'Geschrieben von',
            ////////////////////////////////////////////Mant////////////////////////////////////////////////////////
            'maintenance' => 'Wartung',
            'maintenancemessage' => 'Hallo, wir sind in der Wartung. Bald sind wir zurÃ¼ck',
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
            'Kill' => 'TÃ¶ten',
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
            'addproduct' => 'Produkt hinzufÃ¼gen',
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
            'addadminaccount' => 'Administratorkonto hinzufÃ¼gen',
            /////////////////////////////////////Config/////////////////////////////////////////////////////////
            'gradient' => 'Verlaufsfarben',
            'analytics' => 'Google Analytics',
            'configdownloadbutton' => 'Download-Button',
            'activate' => 'Aktivieren Sie',
            'deactivate' => 'Deaktivieren',
            'changelegal' => 'Rechtliches Ã¤ndern',
            'changeterms' => 'Bedingungen Ã¤ndern',
            'changeprivacity' => 'Datenschutz Ã¤ndern',
            'editmenus' => 'MenÃ¼s bearbeiten',
            'change' => 'VerÃ¤nderung',
            /////////////////////////////////////Edit Legal////////////////////////////////////////////////////
            'editlegal' => 'Rechtliche Hinweise bearbeiten',
            'textlegal' => 'Rechtstext',
            ////////////////////////////////////Edit Terms////////////////////////////////////////////////////
            'editterms' => 'AGB bearbeiten',
            'textterms' => 'Allgemeine GeschÃ¤ftsbedingungen in Textform',
            ///////////////////////////////////Edit Privacity////////////////////////////////////////////////
            'editprivacity' => 'Datenschutz bearbeiten',
            'textprivacity' => 'Text-Datenschutz',
            ////////////////////////////////////Edit Menus//////////////////////////////////////////////////
            'iconlist' => 'Symbolliste',
            'descriptionmenu' => 'Beschreibung des MenÃ¼s',
            'iconmenu1' => 'SymbolmenÃ¼ 1',
            'iconmenu2' => 'SymbolmenÃ¼ 2',
            'iconmenu3' => 'SymbolmenÃ¼ 3',
            'titlemenu1' => 'TitelmenÃ¼ 1',
            'titlemenu2' => 'TitelmenÃ¼ 2',
            'titlemenu2' => 'TitelmenÃ¼ 3',
            'textmenu1' => 'TextmenÃ¼ 1',
            'textmenu2' => 'TextmenÃ¼ 2',
            'textmenu3' => 'TextmenÃ¼ 3',
            /////////////////////////////////Edit Lang////////////////////////////////////////////////////
            'editlang' => 'Sprache bearbeiten',
            'chooselang' => 'Sprache wÃ¤hlen',
             ////////////////////////////////Data Tables/////////////////////////////////////////////////
             'search' => 'Suche',
             'emptyTable' => 'Es gibt keine Informationen',
             'infotable' => 'Es werden _START_ bis _END_ von _TOTAL_ EintrÃ¤gen angezeigt',
             'infoEmpty' => 'Es werden 0 bis 0 von 0 EintrÃ¤gen angezeigt',
             'infoFiltered' => '(Filterung von insgesamt _MAX_ EintrÃ¤gen)',
             'lengthMenu' => '_MENU_ EintrÃ¤ge anzeigen',
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
             'reset' => 'ZurÃ¼cksetzen',
             'player' => 'Charakter',
             'createticket' => 'Ticket erstellen',
             'tickettext' => 'Tickettext',
             'addticket' => 'Ticket Ã¼bermitteln',
             'chooseticket' => 'WÃ¤hlen Sie die Art des Tickets',
             'feedback' => 'Feedback',
             'tickets' => 'Eintrittskarten',
             'available' => 'VerfÃ¼gbar',
             'updates' => 'Aktualisieren',
             'about' => 'Um',
             'balanceavailable' => 'VerfÃ¼gbares Guthaben',
             'confirmnewpassword' => 'BestÃ¤tige neues Passwort',
             'newpassword' => 'Neues Passwort',
             'oldpassword' => 'Jetziges Passwort',
             'browser' => 'Browser',
             'changepassword' => 'Passwort Ã¤ndern',
             'rechargeok' => 'Zahlung erfolgreich abgeschlossen',
            ///////////////////////////////////0.7//////////////////////////////////////////////////////
            'commands' => 'Kommandanten',
            'hdd' => 'Festplatte',
            'cpu' => 'Zentralprozessor',
            'ram' => 'RAM',
            'version' => 'Lokale Version',
            'id' => 'ID',
            ////////////////////////////////////0.8////////////////////////////////////////////////////
           'changelog' => 'Ã„nderungsprotokoll',
           'addchangelog' => 'Ã„nderungsprotokoll erstellen',
             
        );














        $ru = array(
             ////////////////////////////////////////////Home////////////////////////////////////////////////////////
             'downloadbutton' => 'ÑÐºÐ°Ñ‡Ð°Ñ‚ÑŒ',
             'onlineplayers' => 'Ð¾Ð½Ð»Ð°Ð¹Ð½-Ð¸Ð³Ñ€Ð¾ÐºÐ¸',
             'listusers' => 'ÑÐ¿Ð¸ÑÐ¾Ðº Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»ÐµÐ¹',
             'listplayers' => 'ÑÐ¿Ð¸ÑÐ¾Ðº Ð¸Ð³Ñ€Ð¾ÐºÐ¾Ð²',
             'shop' => 'Ð¼Ð°Ð³Ð°Ð·Ð¸Ð½',
             'news' => 'ÐÐ¾Ð²Ð¾ÑÑ‚Ð¸',
             'register' => 'Ñ€ÐµÐ³Ð¸ÑÑ‚Ñ€',
             'password' => 'Ð¿Ð°Ñ€Ð¾Ð»ÑŒ',
             'confirmpassword' => 'ÐŸÐ¾Ð´Ñ‚Ð²ÐµÑ€Ð´Ð¸Ñ‚ÑŒ ÐŸÐ°Ñ€Ð¾Ð»ÑŒ',
             'email' => 'ÑÐ»ÐµÐºÑ‚Ñ€Ð¾Ð½Ð½Ð¾Ð¹ Ð¿Ð¾Ñ‡Ñ‚Ñ‹',
             'forgotpassword' => 'Ð·Ð°Ð±Ñ‹Ð» Ð¿Ð°Ñ€Ð¾Ð»ÑŒ?',
             'login' => 'Ð»Ð¾Ð³Ð¸Ð½',
             'statistics' => 'ÑÑ‚Ð°Ñ‚Ð¸ÑÑ‚Ð¸ÐºÐ°',
             'onlinetime' => 'Ð¾Ð½Ð»Ð°Ð¹Ð½ Ð²Ñ€ÐµÐ¼Ñ',
             'useronline' => 'Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»Ð¸ Ð¾Ð½Ð»Ð°Ð¹Ð½',
             'usersregistered' => 'Ð·Ð°Ñ€ÐµÐ³Ð¸ÑÑ‚Ñ€Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð½Ñ‹Ðµ Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»Ð¸',
             'features' => 'ÐžÑÐ¾Ð±ÐµÐ½Ð½Ð¾ÑÑ‚Ð¸',
             'copyright' => 'ÐÐ²Ñ‚Ð¾Ñ€ÑÐºÐ¸Ðµ Ð¿Ñ€Ð°Ð²Ð°',
             'legalnotice' => 'ÑŽÑ€Ð¸Ð´Ð¸Ñ‡ÐµÑÐºÐ¾Ðµ ÑƒÐ²ÐµÐ´Ð¾Ð¼Ð»ÐµÐ½Ð¸Ðµ',
             'terms' => 'ÑƒÑÐ»Ð¾Ð²Ð¸Ñ',
             'privacity' => 'ÐºÐ¾Ð½Ñ„Ð¸Ð´ÐµÐ½Ñ†Ð¸Ð°Ð»ÑŒÐ½Ð¾ÑÑ‚ÑŒ',
             'disconnect' => 'ÐžÑ‚ÐºÐ»ÑŽÑ‡Ð¸Ñ‚ÑŒ',
             'administrativepanel' => 'Ð°Ð´Ð¼Ð¸Ð½Ð¸ÑÑ‚Ñ€Ð°Ñ‚Ð¸Ð²Ð½Ð°Ñ Ð¿Ð°Ð½ÐµÐ»ÑŒ',
             'name' => 'Ð¸Ð¼Ñ',
             'language' => 'ÑÐ·Ñ‹Ðº',
             ////////////////////////////////////////////Players Online////////////////////////////////////////////////////////
             'class' => 'ÐºÐ»Ð°ÑÑ',
             'gender' => 'ÐŸÐ¾Ð»',
             'exp' => 'Ð¾Ð¿Ñ‹Ñ‚',
             'map' => 'ÐºÐ°Ñ€Ñ‚Ð°',
             ////////////////////////////////////////////Users////////////////////////////////////////////////////////
             'timeplayed' => 'Ð²Ñ€ÐµÐ¼Ñ Ð² Ð¸Ð³Ñ€Ðµ',
             'banned' => 'Ð·Ð°Ð¿Ñ€ÐµÑ‰ÐµÐ½',
             'muted' => 'Ð¿Ñ€Ð¸Ð³Ð»ÑƒÑˆÐµÐ½Ð½Ñ‹Ð¹',
             ////////////////////////////////////////////Players////////////////////////////////////////////////////////
             'level' => 'ÑƒÑ€Ð¾Ð²ÐµÐ½ÑŒ',
             'status' => 'ÑÑ‚Ð°Ñ‚ÑƒÑ',
             ////////////////////////////////////////////Shop////////////////////////////////////////////////////////
             'productdetail' => 'Ð¸Ð½Ñ„Ð¾Ñ€Ð¼Ð°Ñ†Ð¸Ñ Ð¾ Ð¿Ñ€Ð¾Ð´ÑƒÐºÑ‚Ðµ',
             'atackan' => 'ÐÐ½Ð¸Ð¼Ð°Ñ†Ð¸Ñ Ð°Ñ‚Ð°ÐºÐ¸',
             'interacan' => 'ÐÐ½Ð¸Ð¼Ð°Ñ†Ð¸Ñ Ð²Ð·Ð°Ð¸Ð¼Ð¾Ð´ÐµÐ¹ÑÑ‚Ð²Ð¸Ñ',
             'return' => 'Ð²Ð¾Ð·Ð²Ñ€Ð°Ñ‰Ð°Ñ‚ÑŒÑÑ',
             'buy' => 'ÐºÑƒÐ¿Ð¸Ñ‚ÑŒ',
             'paymentmethod' => 'ÐœÐµÑ‚Ð¾Ð´ Ð¾Ð¿Ð»Ð°Ñ‚Ñ‹',
             ////////////////////////////////////////////News////////////////////////////////////////////////////////
             'lastnews' => 'ÐŸÐ¾ÑÐ»ÐµÐ´Ð½Ð¸Ðµ Ð½Ð¾Ð²Ð¾ÑÑ‚Ð¸',
             'writedby' => 'ÐÐ°Ð¿Ð¸ÑÐ°Ð½Ð¾',
             ////////////////////////////////////////////Mant////////////////////////////////////////////////////////
             'maintenance' => 'Ñ‚ÐµÑ…Ð½Ð¸Ñ‡ÐµÑÐºÐ¾Ðµ Ð¾Ð±ÑÐ»ÑƒÐ¶Ð¸Ð²Ð°Ð½Ð¸Ðµ',
             'maintenancemessage' => 'Ð¿Ñ€Ð¸Ð²ÐµÑ‚, Ð¼Ñ‹ Ð½Ð° Ñ‚ÐµÑ…Ð½Ð¸Ñ‡ÐµÑÐºÐ¾Ð¼ Ð¾Ð±ÑÐ»ÑƒÐ¶Ð¸Ð²Ð°Ð½Ð¸Ð¸. ÑÐºÐ¾Ñ€Ð¾ Ð¼Ñ‹ Ð²ÐµÑ€Ð½ÐµÐ¼ÑÑ',
             'maintenanceenter' => 'Ð’Ð¾Ð¹Ñ‚Ð¸ ÐºÐ°Ðº Ð°Ð´Ð¼Ð¸Ð½Ð¸ÑÑ‚Ñ€Ð°Ñ‚Ð¾Ñ€',
             'enter' => 'Ð»Ð¾Ð³Ð¸Ð½',
             'user' => 'Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»ÑŒ',
             /////////////////////////////////////////////Recover////////////////////////////////////////////////////
             'recoverpassword' => 'Ð’Ð¾ÑÑÑ‚Ð°Ð½Ð¾Ð²Ð¸Ñ‚ÑŒ Ð¿Ð°Ñ€Ð¾Ð»ÑŒ',
             'recover' => 'Ð’Ð¾ÑÑÑ‚Ð°Ð½Ð°Ð²Ð»Ð¸Ð²Ð°Ñ‚ÑŒÑÑ',
             ////////////////////////////////////////////Dashboard///////////////////////////////////////////////////
             'totalplayers' => 'Ð’ÑÐµÐ³Ð¾ Ð¸Ð³Ñ€Ð¾ÐºÐ¾Ð²',
             'cps' => 'CPS-ÑÐµÑ€Ð²ÐµÑ€',
             'directmessage' => 'Ð›Ð¸Ñ‡Ð½Ð¾Ðµ ÑÐ¾Ð¾Ð±Ñ‰ÐµÐ½Ð¸Ðµ',
             'userorplayer' => 'Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»ÑŒ Ð¸Ð»Ð¸ Ð¸Ð³Ñ€Ð¾Ðº',
             'message' => 'ÑÐ¾Ð¾Ð±Ñ‰ÐµÐ½Ð¸Ðµ',
             'mapmessage' => 'Ð¡Ð¾Ð¾Ð±Ñ‰ÐµÐ½Ð¸Ðµ ÐºÐ°Ñ€Ñ‚Ñ‹',
             'mapid' => 'Ð¸Ð´ÐµÐ½Ñ‚Ð¸Ñ„Ð¸ÐºÐ°Ñ‚Ð¾Ñ€ ÐºÐ°Ñ€Ñ‚Ñ‹',
             'globalmessage' => 'Ð“Ð»Ð¾Ð±Ð°Ð»ÑŒÐ½Ð¾Ðµ ÑÐ¾Ð¾Ð±Ñ‰ÐµÐ½Ð¸Ðµ',
             'consolecommand' => 'ÐºÐ¾Ð½ÑÐ¾Ð»ÑŒÐ½Ð°Ñ ÐºÐ¾Ð¼Ð°Ð½Ð´Ð°',
             'command' => 'ÐšÐ¾Ð¼Ð°Ð½Ð´Ð°',
             'ban' => 'Ð·Ð°Ð¿Ñ€ÐµÑ‚',
             'reason' => 'ÐŸÑ€Ð¸Ñ‡Ð¸Ð½Ð°',
             'duration' => 'ÐŸÑ€Ð¾Ð´Ð¾Ð»Ð¶Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð¾ÑÑ‚ÑŒ(Ð”Ð½Ð¸)',
             'mute' => 'Ð½ÐµÐ¼Ð¾Ð¹',
             'unban' => 'Ð Ð°Ð·Ð±Ð»Ð¾ÐºÐ¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ',
             'unmute' => 'Ð²ÐºÐ»ÑŽÑ‡Ð¸Ñ‚ÑŒ Ð·Ð²ÑƒÐº',
             'teleport' => 'Ñ‚ÐµÐ»ÐµÐ¿Ð¾Ñ€Ñ‚',
             'kickuser' => 'Ð²Ñ‹Ð³Ð½Ð°Ñ‚ÑŒ Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»Ñ',
             'Kill' => 'ÑƒÐ±Ð¸Ð¹ÑÑ‚Ð²Ð¾',
             ////////////////////////////////////////////Sidebar/////////////////////////////////////////////////////
             'home' => 'Ð´Ð¾Ð¼',
             'dashboard' => 'Ð¿Ñ€Ð¸Ð±Ð¾Ñ€Ð½Ð°Ñ Ð´Ð¾ÑÐºÐ°',
             'objects' => 'ÐžÐ±ÑŠÐµÐºÑ‚Ñ‹',
             'events' => 'Ð¡Ð¾Ð±Ñ‹Ñ‚Ð¸Ñ',
             'quests' => 'ÐºÐ²ÐµÑÑ‚',
             'logs' => 'Ð¶ÑƒÑ€Ð½Ð°Ð»',
             'adminaccounts' => 'Ð£Ñ‡ÐµÑ‚Ð½Ñ‹Ðµ Ð·Ð°Ð¿Ð¸ÑÐ¸ Ð°Ð´Ð¼Ð¸Ð½Ð¸ÑÑ‚Ñ€Ð°Ñ‚Ð¾Ñ€Ð°',
             'config' => 'ÐºÐ¾Ð½Ñ„Ð¸Ð³ÑƒÑ€Ð°Ñ†Ð¸Ñ',
             'maps' => 'ÐºÐ°Ñ€Ñ‚Ñ‹',
             ///////////////////////////////////////Shop Admin/////////////////////////////////////////////////////
             'price' => 'Ð¦ÐµÐ½Ð°',
             'products' => 'Ð¢Ð¾Ð²Ð°Ñ€Ñ‹',
             'description' => 'ÐžÐ¿Ð¸ÑÐ°Ð½Ð¸Ðµ',
             'action' => 'Ð”ÐµÐ¹ÑÑ‚Ð²Ð¸Ðµ',
             'productpic' => 'Ð˜Ð·Ð¾Ð±Ñ€Ð°Ð¶ÐµÐ½Ð¸Ðµ Ð¿Ñ€Ð¾Ð´ÑƒÐºÑ‚Ð°',
             'addproduct' => 'Ð”Ð¾Ð±Ð°Ð²Ð¸Ñ‚ÑŒ Ð¿Ñ€Ð¾Ð´ÑƒÐºÑ‚',
             'editproduct' => 'Ð ÐµÐ´Ð°ÐºÑ‚Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ Ð¿Ñ€Ð¾Ð´ÑƒÐºÑ‚',
             'edit' => 'Ð ÐµÐ´Ð°ÐºÑ‚Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ',
             /////////////////////////////////////News Admin//////////////////////////////////////////////////////
             'addnews' => 'Ð”Ð¾Ð±Ð°Ð²Ð¸Ñ‚ÑŒ Ð½Ð¾Ð²Ð¾ÑÑ‚ÑŒ',
             'title' => 'Ð—Ð°Ð³Ð¾Ð»Ð¾Ð²Ð¾Ðº',
             'textnews' => 'Ñ‚ÐµÐºÑÑ‚Ð¾Ð²Ñ‹Ðµ Ð½Ð¾Ð²Ð¾ÑÑ‚Ð¸',
             'newspic' => 'ÐÐ¾Ð²Ð¾ÑÑ‚Ð¸ Ð¤Ð¾Ñ‚Ð¾',
             'uploadnews' => 'Ð—Ð°Ð³Ñ€ÑƒÐ·Ð¸Ñ‚ÑŒ Ð½Ð¾Ð²Ð¾ÑÑ‚Ð¸',
             'date' => 'Ð¡Ð²Ð¸Ð´Ð°Ð½Ð¸Ðµ',
             ////////////////////////////////////Objects Admin////////////////////////////////////////////////////
             'key' => 'ÐšÐ»ÑŽÑ‡',
             ///////////////////////////////////////Logs/////////////////////////////////////////////////////////
             'admin' => 'Ð°Ð´Ð¼Ð¸Ð½Ð¸ÑÑ‚Ñ€Ð°Ñ‚Ð¾Ñ€',
             'logs' => 'Ð–ÑƒÑ€Ð½Ð°Ð»Ñ‹',
             //////////////////////////////////////Admin Accounts////////////////////////////////////////////////
             'addadminaccount' => 'Add Admin Account',
             /////////////////////////////////////Config/////////////////////////////////////////////////////////
             'gradient' => 'Ð“Ñ€Ð°Ð´Ð¸ÐµÐ½Ñ‚Ð½Ñ‹Ðµ Ñ†Ð²ÐµÑ‚Ð°',
             'analytics' => 'Ð“ÑƒÐ³Ð» ÐÐ½Ð°Ð»Ð¸Ñ‚Ð¸ÐºÐ°',
             'configdownloadbutton' => 'ÐšÐ½Ð¾Ð¿ÐºÐ° Ð·Ð°Ð³Ñ€ÑƒÐ·ÐºÐ¸',
             'activate' => 'ÐÐºÑ‚Ð¸Ð²Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ',
             'deactivate' => 'Ð”ÐµÐ°ÐºÑ‚Ð¸Ð²Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ',
             'changelegal' => 'Ð˜Ð·Ð¼ÐµÐ½Ð¸Ñ‚ÑŒ ÑŽÑ€Ð¸Ð´Ð¸Ñ‡ÐµÑÐºÐ¸Ð¹',
             'changeterms' => 'Ð˜Ð·Ð¼ÐµÐ½Ð¸Ñ‚ÑŒ ÑƒÑÐ»Ð¾Ð²Ð¸Ñ',
             'changeprivacity' => 'Ð˜Ð·Ð¼ÐµÐ½Ð¸Ñ‚ÑŒ ÐºÐ¾Ð½Ñ„Ð¸Ð´ÐµÐ½Ñ†Ð¸Ð°Ð»ÑŒÐ½Ð¾ÑÑ‚ÑŒ',
             'editmenus' => 'Ð ÐµÐ´Ð°ÐºÑ‚Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ Ð¼ÐµÐ½ÑŽ',
             'change' => 'Ð˜Ð·Ð¼ÐµÐ½ÑÑ‚ÑŒ',
             /////////////////////////////////////Edit Legal////////////////////////////////////////////////////
             'editlegal' => 'Ñ€ÐµÐ´Ð°ÐºÑ‚Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ ÑŽÑ€Ð¸Ð´Ð¸Ñ‡ÐµÑÐºÐ¸Ð¹',
             'textlegal' => 'Ñ‚ÐµÐºÑÑ‚ Ð»ÐµÐ³Ð°Ð»ÑŒÐ½Ñ‹Ð¹',
             ////////////////////////////////////Edit Terms////////////////////////////////////////////////////
             'editterms' => 'Ñ€ÐµÐ´Ð°ÐºÑ‚Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ ÑƒÑÐ»Ð¾Ð²Ð¸Ñ',
             'textterms' => 'Ñ‚ÐµÐºÑÑ‚Ð¾Ð²Ñ‹Ðµ Ñ‚ÐµÑ€Ð¼Ð¸Ð½Ñ‹',
             ///////////////////////////////////Edit Privacity////////////////////////////////////////////////
             'editprivacity' => 'Ð¸Ð·Ð¼ÐµÐ½Ð¸Ñ‚ÑŒ ÐºÐ¾Ð½Ñ„Ð¸Ð´ÐµÐ½Ñ†Ð¸Ð°Ð»ÑŒÐ½Ð¾ÑÑ‚ÑŒ',
             'textprivacity' => 'ÐºÐ¾Ð½Ñ„Ð¸Ð´ÐµÐ½Ñ†Ð¸Ð°Ð»ÑŒÐ½Ð¾ÑÑ‚ÑŒ Ñ‚ÐµÐºÑÑ‚Ð°',
             ////////////////////////////////////Edit Menus//////////////////////////////////////////////////
             'iconlist' => 'Ð¡Ð¿Ð¸ÑÐ¾Ðº Ð·Ð½Ð°Ñ‡ÐºÐ¾Ð²',
             'descriptionmenu' => 'Ð¼ÐµÐ½ÑŽ Ð¾Ð¿Ð¸ÑÐ°Ð½Ð¸Ñ',
             'iconmenu1' => 'Ð·Ð½Ð°Ñ‡Ð¾Ðº Ð¼ÐµÐ½ÑŽ 1',
             'iconmenu2' => 'Ð·Ð½Ð°Ñ‡Ð¾Ðº Ð¼ÐµÐ½ÑŽ 2',
             'iconmenu3' => 'Ð·Ð½Ð°Ñ‡Ð¾Ðº Ð¼ÐµÐ½ÑŽ 3',
             'titlemenu1' => 'Ð¼ÐµÐ½ÑŽ Ð·Ð°Ð³Ð¾Ð»Ð¾Ð²ÐºÐ° 1',
             'titlemenu2' => 'Ð¼ÐµÐ½ÑŽ Ð·Ð°Ð³Ð¾Ð»Ð¾Ð²ÐºÐ° 2',
             'titlemenu2' => 'Ð¼ÐµÐ½ÑŽ Ð·Ð°Ð³Ð¾Ð»Ð¾Ð²ÐºÐ° 3',
             'textmenu1' => 'Ð¢ÐµÐºÑÑ‚Ð¾Ð²Ð¾Ðµ Ð¼ÐµÐ½ÑŽ 1',
             'textmenu2' => 'Ð¢ÐµÐºÑÑ‚Ð¾Ð²Ð¾Ðµ Ð¼ÐµÐ½ÑŽ 2',
             'textmenu3' => 'Ð¢ÐµÐºÑÑ‚Ð¾Ð²Ð¾Ðµ Ð¼ÐµÐ½ÑŽ 3',
             /////////////////////////////////Edit Lang////////////////////////////////////////////////////
             'editlang' => 'Ð¸Ð·Ð¼ÐµÐ½Ð¸Ñ‚ÑŒ ÑÐ·Ñ‹Ðº',
             'chooselang' => 'Ð²Ñ‹Ð±ÐµÑ€Ð¸Ñ‚Ðµ ÑÐ·Ñ‹Ðº',
              ////////////////////////////////Data Tables/////////////////////////////////////////////////
              'search' => 'Ð¿Ð¾Ð¸ÑÐº',
              'emptyTable' => 'Ð¸Ð½Ñ„Ð¾Ñ€Ð¼Ð°Ñ†Ð¸Ñ Ð¾Ñ‚ÑÑƒÑ‚ÑÑ‚Ð²ÑƒÐµÑ‚',
              'infotable' => 'ÐŸÐ¾ÐºÐ°Ð·Ð°Ð½Ð¾ Ñ _START_ Ð¿Ð¾ _END_ Ð¸Ð· _TOTAL_ Ð·Ð°Ð¿Ð¸ÑÐµÐ¹',
              'infoEmpty' => 'ÐŸÐ¾ÐºÐ°Ð·Ð°Ð½Ð¾ Ð¾Ñ‚ 0 Ð´Ð¾ 0 Ð¸Ð· 0 Ð·Ð°Ð¿Ð¸ÑÐµÐ¹',
              'infoFiltered' => '(Ð¤Ð¸Ð»ÑŒÑ‚Ñ€Ð°Ñ†Ð¸Ñ Ð²ÑÐµÐ³Ð¾  _MAX_ Ð·Ð°Ð¿Ð¸ÑÐµÐ¹)',
              'lengthMenu' => 'ÐŸÐ¾ÐºÐ°Ð·Ð°Ñ‚ÑŒ _MENU_ Ð·Ð°Ð¿Ð¸ÑÑŒ',
              'loadingRecords' => 'Ð·Ð°Ð³Ñ€ÑƒÐ·ÐºÐ°...',
              'processing' => 'Ð¾Ð±Ñ€Ð°Ð±Ð¾Ñ‚ÐºÐ°...',
              'zeroRecords' => 'Ð ÐµÐ·ÑƒÐ»ÑŒÑ‚Ð°Ñ‚Ð¾Ð² Ð½Ðµ Ð½Ð°Ð¹Ð´ÐµÐ½Ð¾',
              'first' => 'Ð¿ÐµÑ€Ð²Ñ‹Ð¹',
              'last' => 'Ð¿Ð¾ÑÐ»ÐµÐ´Ð½Ð¸Ð¹',
              'next' => 'ÑÐ»ÐµÐ´ÑƒÑŽÑ‰Ð¸Ð¹',
              'previous' => 'Ð¿Ñ€ÐµÐ´Ñ‹Ð´ÑƒÑ‰Ð¸Ð¹',
              /////////////////////////////////Panel User///////////////////////////////////////////////////
              'paneluser' => 'Ð¿Ð°Ð½ÐµÐ»ÑŒ Ð¿Ð¾Ð»ÑŒÐ·Ð¾Ð²Ð°Ñ‚ÐµÐ»Ñ',
              'recharge' => 'Ð¿ÐµÑ€ÐµÐ·Ð°Ñ€ÑÐ´ÐºÐ°',
              'reset' => 'Ð¿ÐµÑ€ÐµÐ·Ð°Ð³Ñ€ÑƒÐ·Ð¸Ñ‚ÑŒ',
              'player' => 'Ð¸Ð³Ñ€Ð¾Ðº',
              'createticket' => 'ÑÐ¾Ð·Ð´Ð°Ñ‚ÑŒ Ñ‚Ð¸ÐºÐµÑ‚',
              'tickettext' => 'Ñ‚ÐµÐºÑÑ‚ Ð±Ð¸Ð»ÐµÑ‚Ð°',
              'addticket' => 'Ð´Ð¾Ð±Ð°Ð²Ð¸Ñ‚ÑŒ Ð±Ð¸Ð»ÐµÑ‚',
              'chooseticket' => 'Ð²Ñ‹Ð±Ñ€Ð°Ñ‚ÑŒ Ð±Ð¸Ð»ÐµÑ‚',
              'feedback' => 'ÐžÐ±Ñ€Ð°Ñ‚Ð½Ð°Ñ ÑÐ²ÑÐ·ÑŒ',
              'tickets' => 'Ð‘Ð¸Ð»ÐµÑ‚Ñ‹',
              'available' => 'Ð´Ð¾ÑÑ‚ÑƒÐ¿Ð½Ñ‹Ð¹',
              'updates' => 'ÐžÐ±Ð½Ð¾Ð²Ð»ÐµÐ½Ð¸Ñ',
              'about' => 'Ð¾ÐºÐ¾Ð»Ð¾',
              'balanceavailable' => 'Ð´Ð¾ÑÑ‚ÑƒÐ¿Ð½Ñ‹Ð¹ Ð±Ð°Ð»Ð°Ð½Ñ',
              'confirmnewpassword' => 'Ð¿Ð¾Ð´Ñ‚Ð²ÐµÑ€Ð´Ð¸Ñ‚Ðµ Ð½Ð¾Ð²Ñ‹Ð¹ Ð¿Ð°Ñ€Ð¾Ð»ÑŒ',
              'newpassword' => 'ÐÐ¾Ð²Ñ‹Ð¹ Ð¿Ð°Ñ€Ð¾Ð»ÑŒ',
              'oldpassword' => 'Ð¡Ñ‚Ð°Ñ€Ñ‹Ð¹ Ð¿Ð°Ñ€Ð¾Ð»ÑŒ',
              'browser' => 'Ð±Ñ€Ð°ÑƒÐ·ÐµÑ€',
              'changepassword' => 'Ð¸Ð·Ð¼ÐµÐ½Ð¸Ñ‚ÑŒ Ð¿Ð°Ñ€Ð¾Ð»ÑŒ',
              'rechargeok' => 'Ð¿ÐµÑ€ÐµÐ·Ð°Ñ€ÑÐ´ÐºÐ° Ð² Ð¿Ð¾Ñ€ÑÐ´ÐºÐµ',
            ///////////////////////////////////0.7//////////////////////////////////////////////////////
            'commands' => 'ÐºÐ¾Ð¼Ð°Ð½Ð´Ñ‹',
            'hdd' => 'Ð¶ÐµÑÑ‚ÐºÐ¸Ð¹ Ð´Ð¸ÑÐº',
            'cpu' => 'ÐŸÑ€Ð¾Ñ†ÐµÑÑÐ¾Ñ€',
            'ram' => 'Ð‘ÐÐ ÐÐ',
            'version' => 'Ð›Ð¾ÐºÐ°Ð»ÑŒÐ½Ð°Ñ Ð²ÐµÑ€ÑÐ¸Ñ',
            'id' => 'Ð¯ Ð‘Ð«',
            ////////////////////////////////////0.8////////////////////////////////////////////////////
           'changelog' => 'Ð¡Ð¿Ð¸ÑÐ¾Ðº Ð¸Ð·Ð¼ÐµÐ½ÐµÐ½Ð¸Ð¹',
           'addchangelog' => 'Ð¡Ð¾Ð·Ð´Ð°Ñ‚ÑŒ Ð¶ÑƒÑ€Ð½Ð°Ð» Ð¸Ð·Ð¼ÐµÐ½ÐµÐ½Ð¸Ð¹',

             
        );














        $zh = array(
            ////////////////////////////////////////////Home////////////////////////////////////////////////////////
            'downloadbutton' => 'ä¸‹è½½',
            'onlineplayers' => 'åœ¨çº¿çŽ©å®¶',
            'listusers' => 'åˆ—å‡ºç”¨æˆ·',
            'listplayers' => 'åˆ—å‡ºçŽ©å®¶',
            'shop' => 'å•†åº—',
            'news' => 'æ–°é—»',
            'register' => 'æ³¨å†Œ',
            'password' => 'å¯†ç ',
            'confirmpassword' => 'ç¡®è®¤å¯†ç ',
            'email' => 'ç”µå­é‚®ä»¶',
            'forgotpassword' => 'å¿˜è®°å¯†ç ï¼Ÿ',
            'login' => 'ç™»å½•',
            'statistics' => 'ç»Ÿè®¡æ•°æ®',
            'onlinetime' => 'åœ¨çº¿æ—¶é—´',
            'useronline' => 'åœ¨çº¿ç”¨æˆ·',
            'usersregistered' => 'æ³¨å†Œç”¨æˆ·',
            'features' => 'ç‰¹ç‚¹',
            'copyright' => 'ç‰ˆæƒ',
            'legalnotice' => 'æ³•å¾‹å£°æ˜Ž',
            'terms' => 'ä½¿ç”¨æ¡æ¬¾',
            'privacity' => 'éšç§æ”¿ç­–',
            'disconnect' => 'æ–­å¼€è¿žæŽ¥',
            'administrativepanel' => 'ç®¡ç†é¢æ¿',
            'name' => 'åç§°',
            'language' => 'è¯­è¨€',
            ////////////////////////////////////////////Players Online////////////////////////////////////////////////////////
            'class' => 'èŒä¸š',
            'gender' => 'æ€§åˆ«',
            'exp' => 'ç»éªŒ',
            'map' => 'åœ°å›¾',
            ////////////////////////////////////////////Users////////////////////////////////////////////////////////
            'timeplayed' => 'æ¸¸æˆæ—¶é—´',
            'banned' => 'å°ç¦',
            'muted' => 'ç¦è¨€',
            ////////////////////////////////////////////Players////////////////////////////////////////////////////////
            'level' => 'ç­‰çº§',
            'status' => 'çŠ¶æ€',
            ////////////////////////////////////////////Shop////////////////////////////////////////////////////////
            'productdetail' => 'å•†å“è¯¦æƒ…',
            'atackan' => 'æ”»å‡»åŠ¨ç”»',
            'interacan' => 'äº’åŠ¨åŠ¨ç”»',
            'return' => 'è¿”å›ž',
            'buy' => 'è´­ä¹°',
            'paymentmethod' => 'æ”¯ä»˜æ–¹å¼',
            ////////////////////////////////////////////News////////////////////////////////////////////////////////
            'lastnews' => 'æœ€æ–°æ–°é—»',
            'writedby' => 'ä½œè€…',
            ////////////////////////////////////////////Mant////////////////////////////////////////////////////////
            'maintenance' => 'ç»´æŠ¤',
            'maintenancemessage' => 'æ‚¨å¥½ï¼Œæˆ‘ä»¬æ­£åœ¨è¿›è¡Œç»´æŠ¤ã€‚å¾ˆå¿«æˆ‘ä»¬å°†å›žæ¥ã€‚',
            'maintenanceenter' => 'ä»¥ç®¡ç†å‘˜èº«ä»½ç™»å½•',
            'enter' => 'ç™»å½•',
            'user' => 'ç”¨æˆ·',
            /////////////////////////////////////////////Recover////////////////////////////////////////////////////
            'recoverpassword' => 'æ‰¾å›žå¯†ç ',
            'recover' => 'æ‰¾å›ž',
            ////////////////////////////////////////////Dashboard///////////////////////////////////////////////////
            'totalplayers' => 'æ€»çŽ©å®¶æ•°',
            'cps' => 'CPS æœåŠ¡å™¨',
            'directmessage' => 'ç›´æŽ¥æ¶ˆæ¯',
            'userorplayer' => 'ç”¨æˆ·æˆ–çŽ©å®¶',
            'message' => 'æ¶ˆæ¯',
            'mapmessage' => 'åœ°å›¾æ¶ˆæ¯',
            'mapid' => 'åœ°å›¾ID',
            'globalmessage' => 'å…¨å±€æ¶ˆæ¯',
            'consolecommand' => 'æŽ§åˆ¶å°å‘½ä»¤',
            'command' => 'å‘½ä»¤',
            'ban' => 'å°ç¦',
            'reason' => 'åŽŸå› ',
            'duration' => 'å°ç¦æ—¶é•¿ï¼ˆå¤©ï¼‰',
            'mute' => 'ç¦è¨€',
            'unban' => 'è§£å°',
            'unmute' => 'è§£ç¦',
            'teleport' => 'ä¼ é€',
            'kickuser' => 'è¸¢å‡ºç”¨æˆ·',
            'Kill' => 'æ€æ­»',
            ////////////////////////////////////////////Sidebar/////////////////////////////////////////////////////
            'home' => 'é¦–é¡µ',
            'dashboard' => 'ä»ªè¡¨æ¿',
            'objects' => 'ç‰©å“',
            'events' => 'äº‹ä»¶',
            'quests' => 'ä»»åŠ¡',
            'logs' => 'æ—¥å¿—',
            'adminaccounts' => 'ç®¡ç†å‘˜è´¦æˆ·',
            'config' => 'é…ç½®',
            'maps' => 'åœ°å›¾',
            ///////////////////////////////////////Shop Admin/////////////////////////////////////////////////////
            'price' => 'ä»·æ ¼',
            'products' => 'å•†å“',
            'description' => 'æè¿°',
            'action' => 'æ“ä½œ',
            'productpic' => 'å•†å“å›¾ç‰‡',
            'addproduct' => 'æ·»åŠ å•†å“',
            'editproduct' => 'ç¼–è¾‘å•†å“',
            'edit' => 'ç¼–è¾‘',
            /////////////////////////////////////News Admin//////////////////////////////////////////////////////
            'addnews' => 'æ·»åŠ æ–°é—»',
            'title' => 'æ ‡é¢˜',
            'textnews' => 'æ–°é—»å†…å®¹',
            'newspic' => 'æ–°é—»å›¾ç‰‡',
            'uploadnews' => 'ä¸Šä¼ æ–°é—»',
            'date' => 'æ—¥æœŸ',
            ////////////////////////////////////Objects Admin////////////////////////////////////////////////////
            'key' => 'å…³é”®å­—',
            ///////////////////////////////////////Logs/////////////////////////////////////////////////////////
            'admin' => 'ç®¡ç†å‘˜',
            'logs' => 'æ—¥å¿—',
            //////////////////////////////////////Admin Accounts////////////////////////////////////////////////
            'addadminaccount' => 'æ·»åŠ ç®¡ç†å‘˜è´¦æˆ·',
            /////////////////////////////////////Config/////////////////////////////////////////////////////////
            'gradient' => 'æ¸å˜é¢œè‰²',
            'analytics' => 'Google Analytics',
            'configdownloadbutton' => 'ä¸‹è½½æŒ‰é’®',
            'activate' => 'æ¿€æ´»',
            'deactivate' => 'åœç”¨',
            'changelegal' => 'æ›´æ”¹æ³•å¾‹å£°æ˜Ž',
            'changeterms' => 'æ›´æ”¹ä½¿ç”¨æ¡æ¬¾',
            'changeprivacity' => 'æ›´æ”¹éšç§æ”¿ç­–',
            'editmenus' => 'ç¼–è¾‘èœå•',
            'change' => 'æ›´æ”¹',
            /////////////////////////////////////Edit Legal////////////////////////////////////////////////////
            'editlegal' => 'ç¼–è¾‘æ³•å¾‹å£°æ˜Ž',
            'textlegal' => 'æ³•å¾‹å£°æ˜Žæ–‡æœ¬',
            ////////////////////////////////////Edit Terms////////////////////////////////////////////////////
            'editterms' => 'ç¼–è¾‘ä½¿ç”¨æ¡æ¬¾',
            'textterms' => 'ä½¿ç”¨æ¡æ¬¾æ–‡æœ¬',
            ///////////////////////////////////Edit Privacity////////////////////////////////////////////////
            'editprivacity' => 'ç¼–è¾‘éšç§æ”¿ç­–',
            'textprivacity' => 'éšç§æ”¿ç­–æ–‡æœ¬',
            ////////////////////////////////////Edit Menus//////////////////////////////////////////////////
            'iconlist' => 'å›¾æ ‡åˆ—è¡¨',
            'descriptionmenu' => 'èœå•æè¿°',
            'iconmenu1' => 'èœå•å›¾æ ‡1',
            'iconmenu2' => 'èœå•å›¾æ ‡2',
            'iconmenu3' => 'èœå•å›¾æ ‡3',
            'titlemenu1' => 'èœå•æ ‡é¢˜1',
            'titlemenu2' => 'èœå•æ ‡é¢˜2',
            'titlemenu2' => 'èœå•æ ‡é¢˜3',
            'textmenu1' => 'èœå•æ–‡æœ¬1',
            'textmenu2' => 'èœå•æ–‡æœ¬2',
            'textmenu3' => 'èœå•æ–‡æœ¬3',
            /////////////////////////////////Edit Lang////////////////////////////////////////////////////
            'editlang' => 'ç¼–è¾‘è¯­è¨€',
            'chooselang' => 'é€‰æ‹©è¯­è¨€',
             ////////////////////////////////Data Tables/////////////////////////////////////////////////
             'search' => 'æœç´¢',
             'emptyTable' => 'æ²¡æœ‰ä¿¡æ¯',
             'infotable' => 'æ˜¾ç¤º _START_ åˆ° _END_ æ¡è®°å½•ï¼Œå…± _TOTAL_ æ¡',
             'infoEmpty' => 'æ˜¾ç¤º 0 åˆ° 0 æ¡è®°å½•ï¼Œå…± 0 æ¡',
             'infoFiltered' => 'ï¼ˆä»Ž _MAX_ æ¡è®°å½•ä¸­ç­›é€‰å‡ºçš„ç»“æžœï¼‰',
             'lengthMenu' => 'æ˜¾ç¤º _MENU_ æ¡è®°å½•',
             'loadingRecords' => 'åŠ è½½ä¸­...',
             'processing' => 'å¤„ç†ä¸­...',
             'zeroRecords' => 'æ²¡æœ‰æ‰¾åˆ°åŒ¹é…çš„è®°å½•',
             'first' => 'ç¬¬ä¸€é¡µ',
             'last' => 'æœ€åŽä¸€é¡µ',
             'next' => 'ä¸‹ä¸€é¡µ',
             'previous' => 'ä¸Šä¸€é¡µ',
             /////////////////////////////////Panel User///////////////////////////////////////////////////
             'paneluser' => 'ç”¨æˆ·é¢æ¿',
             'recharge' => 'å……å€¼',
             'reset' => 'é‡ç½®',
             'player' => 'è§’è‰²',
             'createticket' => 'åˆ›å»ºå·¥å•',
             'tickettext' => 'å·¥å•å†…å®¹',
             'addticket' => 'å‘é€å·¥å•',
             'chooseticket' => 'é€‰æ‹©å·¥å•ç±»åž‹',
             'feedback' => 'åé¦ˆ',
             'tickets' => 'å·¥å•',
             'available' => 'å¯ç”¨',
             'updates' => 'æ›´æ–°',
             'about' => 'å…³äºŽ',
             'balanceavailable' => 'å¯ç”¨ä½™é¢',
             'confirmnewpassword' => 'ç¡®è®¤æ–°å¯†ç ',
             'newpassword' => 'æ–°å¯†ç ',
             'oldpassword' => 'å½“å‰å¯†ç ',
             'browser' => 'æµè§ˆå™¨',
             'changepassword' => 'æ›´æ”¹å¯†ç ',
             'rechargeok' => 'å……å€¼æˆåŠŸ',
             
             
        );














        $fr = array(
            ////////////////////////////////////////////Home////////////////////////////////////////////////////////
            'downloadbutton' => 'TÃ©lÃ©charger',
            'onlineplayers' => 'Joueurs en ligne',
            'listusers' => 'Lister les utilisateurs',
            'listplayers' => 'Lister les joueurs',
            'shop' => 'Boutique',
            'news' => 'ActualitÃ©s',
            'register' => "S'inscrire",
            'password' => 'Mot de passe',
            'confirmpassword' => 'Confirmer le mot de passe',
            'email' => 'E-mail',
            'forgotpassword' => 'Vous avez oubliÃ© votre mot de passe ?',
            'login' => 'Connexion',
            'statistics' => 'Statistiques',
            'onlinetime' => 'Temps en ligne',
            'useronline' => 'Utilisateurs en ligne',
            'usersregistered' => 'Utilisateurs enregistrÃ©s',
            'features' => 'FonctionnalitÃ©s',
            'copyright' => "Droits d'auteur",
            'legalnotice' => 'Mentions lÃ©gales',
            'terms' => 'Conditions gÃ©nÃ©rales',
            'privacity' => 'ConfidentialitÃ©',
            'disconnect' => 'DÃ©connexion',
            'administrativepanel' => "Panneau d'administration",
            'name' => 'Nom',
            'language' => 'Langue',
            ////////////////////////////////////////////Players Online////////////////////////////////////////////////////////
            'class' => 'Classe',
            'gender' => 'Genre',
            'exp' => 'ExpÃ©rience',
            'map' => 'Carte',
            ////////////////////////////////////////////Users////////////////////////////////////////////////////////
            'timeplayed' => 'Temps de jeu',
            'banned' => 'Banni',
            'muted' => 'Muet',
            ////////////////////////////////////////////Players////////////////////////////////////////////////////////
            'level' => 'Niveau',
            'status' => 'Statut',
            ////////////////////////////////////////////Shop////////////////////////////////////////////////////////
            'productdetail' => 'DÃ©tails du produit',
            'atackan' => "Animation d'attaque",
            'interacan' => "Animation d'interaction",
            'return' => 'Retour',
            'buy' => 'Acheter',
            'paymentmethod' => 'Moyen de paiement',
            ////////////////////////////////////////////News////////////////////////////////////////////////////////
            'lastnews' => 'DerniÃ¨res actualitÃ©s',
            'writedby' => 'Ã‰crit par',
            ////////////////////////////////////////////Mant////////////////////////////////////////////////////////
            'maintenance' => 'Maintenance',
            'maintenancemessage' => 'Bonjour, nous sommes en maintenance. Nous serons bientÃ´t de retour',
            'maintenanceenter' => "Se connecter en tant qu'administrateur",
            'enter' => 'Connexion',
            'user' => 'Utilisateur',
            /////////////////////////////////////////////Recover////////////////////////////////////////////////////
            'recoverpassword' => 'RÃ©cupÃ©rer le mot de passe',
            'recover' => 'RÃ©cupÃ©rer',
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
            'duration' => 'DurÃ©e (jours)',
            'mute' => 'Muet',
            'unban' => 'DÃ©bannir',
            'unmute' => 'DÃ©muter',
            'teleport' => 'TÃ©lÃ©portation',
            'kickuser' => "Expulser l'utilisateur",
            'Kill' => 'Tuer',
            ////////////////////////////////////////////Sidebar/////////////////////////////////////////////////////
            'home' => 'Accueil',
            'dashboard' => 'Tableau de bord',
            'objects' => 'Objets',
            'events' => 'Ã‰vÃ©nements',
            'quests' => 'QuÃªtes',
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
            'addnews' => 'Ajouter des actualitÃ©s',
            'title' => 'Titre',
            'textnews' => 'Texte des actualitÃ©s',
            'newspic' => 'Image des actualitÃ©s',
            'uploadnews' => 'TÃ©lÃ©charger des actualitÃ©s',
            'date' => 'Date',
            ////////////////////////////////////Objects Admin////////////////////////////////////////////////////
            'key' => 'ClÃ©',
            ///////////////////////////////////////Logs/////////////////////////////////////////////////////////
            'admin' => 'Administrateur',
            'logs' => 'Journaux',
            //////////////////////////////////////Admin Accounts////////////////////////////////////////////////
            'addadminaccount' => 'Ajouter un compte administrateur',
            /////////////////////////////////////Config/////////////////////////////////////////////////////////
            'gradient' => 'Couleurs de dÃ©gradÃ©',
            'analytics' => 'Google Analytics',
            'configdownloadbutton' => 'Bouton de tÃ©lÃ©chargement',
            'activate' => 'Activer',
            'deactivate' => 'DÃ©sactiver',
            'changelegal' => 'Changer les mentions lÃ©gales',
            'changeterms' => 'Changer les conditions gÃ©nÃ©rales',
            'changeprivacity' => 'Changer la confidentialitÃ©',
            'editmenus' => 'Modifier les menus',
            'change' => 'Changer',
            /////////////////////////////////////Edit Legal////////////////////////////////////////////////////
            'editlegal' => 'Modifier les mentions lÃ©gales',
            'textlegal' => 'Texte des mentions lÃ©gales',
            ////////////////////////////////////Edit Terms////////////////////////////////////////////////////
            'editterms' => 'Modifier les termes et conditions',
            'textterms' => 'Texte des termes et conditions',
            ///////////////////////////////////Edit Privacity////////////////////////////////////////////////
            'editprivacity' => 'Modifier la confidentialitÃ©',
            'textprivacity' => 'Texte de la confidentialitÃ©',
            ////////////////////////////////////Edit Menus//////////////////////////////////////////////////
            'iconlist' => "Liste d'icÃ´nes",
            'descriptionmenu' => 'Description du menu',
            'iconmenu1' => 'IcÃ´ne du menu 1',
            'iconmenu2' => 'IcÃ´ne du menu 2',
            'iconmenu3' => 'IcÃ´ne du menu 3',
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
             'infotable' => 'Affichage de _START_ Ã  _END_ sur _TOTAL_ entrÃ©es',
             'infoEmpty' => 'Affichage de 0 Ã  0 sur 0 entrÃ©es',
             'infoFiltered' => '(filtrÃ© de _MAX_ entrÃ©es au total)',
             'lengthMenu' => 'Afficher _MENU_ entrÃ©es',
             'loadingRecords' => 'Chargement en cours...',
             'processing' => 'En traitement...',
             'zeroRecords' => 'Aucun rÃ©sultat trouvÃ©',
             'first' => 'Premier',
             'last' => 'Dernier',
             'next' => 'Suivant',
             'previous' => 'PrÃ©cÃ©dent',
             /////////////////////////////////Panel User///////////////////////////////////////////////////
             'paneluser' => 'Panneau utilisateur',
             'recharge' => 'Recharger',
             'reset' => 'RÃ©initialiser',
             'player' => 'Joueur',
             'createticket' => 'CrÃ©er un ticket',
             'tickettext' => 'Texte du ticket',
             'addticket' => 'Envoyer le ticket',
             'chooseticket' => 'Choisir le type de ticket',
             'feedback' => "Retour d'information",
             'tickets' => 'Tickets',
             'available' => 'Disponible',
             'updates' => 'Mises Ã  jour',
             'about' => 'Ã€ propos',
             'balanceavailable' => 'Solde disponible',
             'confirmnewpassword' => 'Confirmer le nouveau mot de passe',
             'newpassword' => 'Nouveau mot de passe',
             'oldpassword' => 'Mot de passe actuel',
             'browser' => 'Navigateur',
             'changepassword' => 'Changer le mot de passe',
             'rechargeok' => 'Paiement rÃ©ussi',
             
        );
















        $pt = array(
            ////////////////////////////////////////////Home////////////////////////////////////////////////////////
            'downloadbutton' => 'Baixar',
            'onlineplayers' => 'Jogadores online',
            'listusers' => 'Listar usuÃ¡rios',
            'listplayers' => 'Listar jogadores',
            'shop' => 'Loja',
            'news' => 'NotÃ­cias',
            'register' => 'Registrar',
            'password' => 'Senha',
            'confirmpassword' => 'Confirmar senha',
            'email' => 'E-mail',
            'forgotpassword' => 'Esqueceu sua senha?',
            'login' => 'Login',
            'statistics' => 'EstatÃ­sticas',
            'onlinetime' => 'Tempo online',
            'useronline' => 'UsuÃ¡rios online',
            'usersregistered' => 'UsuÃ¡rios registrados',
            'features' => 'Recursos',
            'copyright' => 'Direitos autorais',
            'legalnotice' => 'Aviso legal',
            'terms' => 'Termos de serviÃ§o',
            'privacity' => 'Privacidade',
            'disconnect' => 'Desconectar',
            'administrativepanel' => 'Painel administrativo',
            'name' => 'Nome',
            'language' => 'Idioma',
            ////////////////////////////////////////////Players Online////////////////////////////////////////////////////////
            'class' => 'Classe',
            'gender' => 'GÃªnero',
            'exp' => 'ExperiÃªncia',
            'map' => 'Mapa',
            ////////////////////////////////////////////Users////////////////////////////////////////////////////////
            'timeplayed' => 'Tempo de jogo',
            'banned' => 'Banido',
            'muted' => 'Silenciado',
            ////////////////////////////////////////////Players////////////////////////////////////////////////////////
            'level' => 'NÃ­vel',
            'status' => 'Status',
            ////////////////////////////////////////////Shop////////////////////////////////////////////////////////
            'productdetail' => 'Detalhes do produto',
            'atackan' => 'AnimaÃ§Ã£o de ataque',
            'interacan' => 'AnimaÃ§Ã£o de interaÃ§Ã£o',
            'return' => 'Retornar',
            'buy' => 'Comprar',
            'paymentmethod' => 'MÃ©todo de pagamento',
            ////////////////////////////////////////////News////////////////////////////////////////////////////////
            'lastnews' => 'Ãšltimas notÃ­cias',
            'writedby' => 'Escrito por',
            ////////////////////////////////////////////Mant////////////////////////////////////////////////////////
            'maintenance' => 'ManutenÃ§Ã£o',
            'maintenancemessage' => 'OlÃ¡, estamos em manutenÃ§Ã£o. Em breve estaremos de volta',
            'maintenanceenter' => 'Login como administrador',
            'enter' => 'Login',
            'user' => 'UsuÃ¡rio',
            /////////////////////////////////////////////Recover////////////////////////////////////////////////////
            'recoverpassword' => 'Recuperar senha',
            'recover' => 'Recuperar',
            ////////////////////////////////////////////Dashboard///////////////////////////////////////////////////
            'totalplayers' => 'Total de jogadores',
            'cps' => 'Servidor CPS',
            'directmessage' => 'Mensagem direta',
            'userorplayer' => 'UsuÃ¡rio ou jogador',
            'message' => 'Mensagem',
            'mapmessage' => 'Mensagem do mapa',
            'mapid' => 'ID do mapa',
            'globalmessage' => 'Mensagem global',
            'consolecommand' => 'Comando de console',
            'command' => 'Comando',
            'ban' => 'Banir',
            'reason' => 'Motivo',
            'duration' => 'DuraÃ§Ã£o (dias)',
            'mute' => 'Silenciar',
            'unban' => 'Desbanir',
            'unmute' => 'Remover silenciamento',
            'teleport' => 'Teleportar',
            'kickuser' => 'Expulsar usuÃ¡rio',
            'Kill' => 'Matar',
            ////////////////////////////////////////////Sidebar/////////////////////////////////////////////////////
            'home' => 'PÃ¡gina inicial',
            'dashboard' => 'Painel',
            'objects' => 'Objetos',
            'events' => 'Eventos',
            'quests' => 'MissÃµes',
            'logs' => 'Registros',
            'adminaccounts' => 'Contas de administrador',
            'config' => 'ConfiguraÃ§Ã£o',
            'maps' => 'Mapas',
            ///////////////////////////////////////Shop Admin/////////////////////////////////////////////////////
            'price' => 'PreÃ§o',
            'products' => 'Produtos',
            'description' => 'DescriÃ§Ã£o',
            'action' => 'AÃ§Ã£o',
            'productpic' => 'Imagem do produto',
            'addproduct' => 'Adicionar produto',
            'editproduct' => 'Editar produto',
            'edit' => 'Editar',
            /////////////////////////////////////News Admin//////////////////////////////////////////////////////
            'addnews' => 'Adicionar notÃ­cia',
            'title' => 'TÃ­tulo',
            'textnews' => 'Texto da notÃ­cia',
            'newspic' => 'Imagem da notÃ­cia',
            'uploadnews' => 'Carregar notÃ­cia',
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
            'configdownloadbutton' => 'BotÃ£o de download',
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
            'editterms' => 'Editar termos e condiÃ§Ãµes',
            'textterms' => 'Texto dos termos e condiÃ§Ãµes',
            ///////////////////////////////////Edit Privacity////////////////////////////////////////////////
            'editprivacity' => 'Editar privacidade',
            'textprivacity' => 'Texto de privacidade',
            ////////////////////////////////////Edit Menus//////////////////////////////////////////////////
            'iconlist' => 'Lista de Ã­cones',
            'descriptionmenu' => 'DescriÃ§Ã£o do menu',
            'iconmenu1' => 'Ãcone do menu 1',
            'iconmenu2' => 'Ãcone do menu 2',
            'iconmenu3' => 'Ãcone do menu 3',
            'titlemenu1' => 'TÃ­tulo do menu 1',
            'titlemenu2' => 'TÃ­tulo do menu 2',
            'titlemenu2' => 'TÃ­tulo do menu 3',
            'textmenu1' => 'Texto do menu 1',
            'textmenu2' => 'Texto do menu 2',
            'textmenu3' => 'Texto do menu 3',
            /////////////////////////////////Edit Lang////////////////////////////////////////////////////
            'editlang' => 'Editar idioma',
            'chooselang' => 'Escolher idioma',
             ////////////////////////////////Data Tables/////////////////////////////////////////////////
             'search' => 'Buscar',
             'emptyTable' => 'Nenhum dado disponÃ­vel',
             'infotable' => 'Mostrando de _START_ a _END_ de _TOTAL_ entradas',
             'infoEmpty' => 'Mostrando 0 a 0 de 0 entradas',
             'infoFiltered' => '(filtrado de um total de _MAX_ entradas)',
             'lengthMenu' => 'Mostrar _MENU_ entradas',
             'loadingRecords' => 'Carregando...',
             'processing' => 'Processando...',
             'zeroRecords' => 'Nenhum registro encontrado',
             'first' => 'Primeiro',
             'last' => 'Ãšltimo',
             'next' => 'PrÃ³ximo',
             'previous' => 'Anterior',
             /////////////////////////////////Panel User///////////////////////////////////////////////////
             'paneluser' => 'Painel do usuÃ¡rio',
             'recharge' => 'Recarregar',
             'reset' => 'Redefinir',
             'player' => 'Jogador',
             'createticket' => 'Criar ticket',
             'tickettext' => 'Texto do ticket',
             'addticket' => 'Enviar ticket',
             'chooseticket' => 'Escolher tipo de ticket',
             'feedback' => 'Feedback',
             'tickets' => 'Tickets',
             'available' => 'DisponÃ­vel',
             'updates' => 'AtualizaÃ§Ãµes',
             'about' => 'Sobre',
             'balanceavailable' => 'Saldo disponÃ­vel',
             'confirmnewpassword' => 'Confirmar nova senha',
             'newpassword' => 'Nova senha',
             'oldpassword' => 'Senha atual',
             'browser' => 'Navegador',
             'changepassword' => 'Alterar senha',
             'rechargeok' => 'Pagamento concluÃ­do com sucesso',
             
        );











        $hi = array(
            ////////////////////////////////////////////Home////////////////////////////////////////////////////////
            'downloadbutton' => 'à¤¡à¤¾à¤‰à¤¨à¤²à¥‹à¤¡',
            'onlineplayers' => 'à¤‘à¤¨à¤²à¤¾à¤‡à¤¨ à¤–à¤¿à¤²à¤¾à¤¡à¤¼à¥€',
            'listusers' => 'à¤‰à¤ªà¤¯à¥‹à¤—à¤•à¤°à¥à¤¤à¤¾ à¤¸à¥‚à¤šà¥€à¤•à¤°à¤£',
            'listplayers' => 'à¤–à¤¿à¤²à¤¾à¤¡à¤¼à¥€ à¤¸à¥‚à¤šà¥€à¤•à¤°à¤£',
            'shop' => 'à¤¦à¥à¤•à¤¾à¤¨',
            'news' => 'à¤¸à¤®à¤¾à¤šà¤¾à¤°',
            'register' => 'à¤°à¤œà¤¿à¤¸à¥à¤Ÿà¤° à¤•à¤°à¥‡à¤‚',
            'password' => 'à¤ªà¤¾à¤¸à¤µà¤°à¥à¤¡',
            'confirmpassword' => 'à¤ªà¤¾à¤¸à¤µà¤°à¥à¤¡ à¤•à¥€ à¤ªà¥à¤·à¥à¤Ÿà¤¿ à¤•à¤°à¥‡à¤‚',
            'email' => 'à¤ˆà¤®à¥‡à¤²',
            'forgotpassword' => 'à¤•à¥à¤¯à¤¾ à¤†à¤ªà¤¨à¥‡ à¤…à¤ªà¤¨à¤¾ à¤ªà¤¾à¤¸à¤µà¤°à¥à¤¡ à¤­à¥‚à¤² à¤—à¤ à¤¹à¥ˆà¤‚?',
            'login' => 'à¤²à¥‰à¤—à¤¿à¤¨',
            'statistics' => 'à¤†à¤à¤•à¤¡à¤¼à¥‡',
            'onlinetime' => 'à¤‘à¤¨à¤²à¤¾à¤‡à¤¨ à¤¸à¤®à¤¯',
            'useronline' => 'à¤‘à¤¨à¤²à¤¾à¤‡à¤¨ à¤‰à¤ªà¤¯à¥‹à¤—à¤•à¤°à¥à¤¤à¤¾',
            'usersregistered' => 'à¤°à¤œà¤¿à¤¸à¥à¤Ÿà¤° à¤‰à¤ªà¤¯à¥‹à¤—à¤•à¤°à¥à¤¤à¤¾',
            'features' => 'à¤µà¤¿à¤¶à¥‡à¤·à¤¤à¤¾à¤à¤',
            'copyright' => 'à¤•à¥‰à¤ªà¥€à¤°à¤¾à¤‡à¤Ÿ',
            'legalnotice' => 'à¤•à¤¾à¤¨à¥‚à¤¨à¥€ à¤¨à¥‹à¤Ÿà¤¿à¤¸',
            'terms' => 'à¤¨à¤¿à¤¯à¤® à¤”à¤° à¤¶à¤°à¥à¤¤à¥‡à¤‚',
            'privacity' => 'à¤—à¥‹à¤ªà¤¨à¥€à¤¯à¤¤à¤¾',
            'disconnect' => 'à¤¡à¤¿à¤¸à¥à¤•à¤¨à¥‡à¤•à¥à¤Ÿ',
            'administrativepanel' => 'à¤ªà¥à¤°à¤¶à¤¾à¤¸à¤¨à¤¿à¤• à¤ªà¥ˆà¤¨à¤²',
            'name' => 'à¤¨à¤¾à¤®',
            'language' => 'à¤­à¤¾à¤·à¤¾',
            ////////////////////////////////////////////Players Online////////////////////////////////////////////////////////
            'class' => 'à¤•à¥à¤²à¤¾à¤¸',
            'gender' => 'à¤²à¤¿à¤‚à¤—',
            'exp' => 'à¤…à¤¨à¥à¤­à¤µ',
            'map' => 'à¤¨à¤•à¥à¤¶à¤¾',
            ////////////////////////////////////////////Users////////////////////////////////////////////////////////
            'timeplayed' => 'à¤–à¥‡à¤²à¤¾ à¤—à¤¯à¤¾ à¤¸à¤®à¤¯',
            'banned' => 'à¤ªà¥à¤°à¤¤à¤¿à¤¬à¤‚à¤§à¤¿à¤¤',
            'muted' => 'à¤®à¥à¤¯à¥‚à¤Ÿà¥‡à¤¡',
            ////////////////////////////////////////////Players////////////////////////////////////////////////////////
            'level' => 'à¤¸à¥à¤¤à¤°',
            'status' => 'à¤¸à¥à¤¥à¤¿à¤¤à¤¿',
            ////////////////////////////////////////////Shop////////////////////////////////////////////////////////
            'productdetail' => 'à¤‰à¤¤à¥à¤ªà¤¾à¤¦ à¤µà¤¿à¤µà¤°à¤£',
            'atackan' => 'à¤¹à¤®à¤²à¤¾ à¤à¤¨à¤¿à¤®à¥‡à¤¶à¤¨',
            'interacan' => 'à¤‡à¤‚à¤Ÿà¤°à¤à¤•à¥à¤¶à¤¨ à¤à¤¨à¤¿à¤®à¥‡à¤¶à¤¨',
            'return' => 'à¤µà¤¾à¤ªà¤¸à¥€',
            'buy' => 'à¤–à¤°à¥€à¤¦à¥‡à¤‚',
            'paymentmethod' => 'à¤­à¥à¤—à¤¤à¤¾à¤¨ à¤•à¤¾ à¤¤à¤°à¥€à¤•à¤¾',
            ////////////////////////////////////////////News////////////////////////////////////////////////////////
            'lastnews' => 'à¤†à¤–à¤¿à¤°à¥€ à¤–à¤¬à¤°',
            'writedby' => 'à¤²à¤¿à¤–à¤¾ à¤—à¤¯à¤¾ à¤¹à¥ˆ',
            ////////////////////////////////////////////Mant////////////////////////////////////////////////////////
            'maintenance' => 'à¤°à¤–à¤°à¤–à¤¾à¤µ',
            'maintenancemessage' => 'à¤¨à¤®à¤¸à¥à¤¤à¥‡, à¤¹à¤® à¤…à¤­à¥€ à¤°à¤–à¤°à¤–à¤¾à¤µ à¤®à¥‡à¤‚ à¤¹à¥ˆà¤‚à¥¤ à¤œà¤²à¥à¤¦ à¤¹à¥€ à¤¹à¤® à¤µà¤¾à¤ªà¤¸ à¤†à¤à¤‚à¤—à¥‡',
            'maintenanceenter' => 'à¤µà¥à¤¯à¤µà¤¸à¥à¤¥à¤¾à¤ªà¤• à¤•à¥‡ à¤°à¥‚à¤ª à¤®à¥‡à¤‚ à¤²à¥‰à¤—à¤¿à¤¨ à¤•à¤°à¥‡à¤‚',
            'enter' => 'à¤²à¥‰à¤—à¤¿à¤¨',
            'user' => 'à¤‰à¤ªà¤¯à¥‹à¤—à¤•à¤°à¥à¤¤à¤¾',
            /////////////////////////////////////////////Recover////////////////////////////////////////////////////
            'recoverpassword' => 'à¤ªà¤¾à¤¸à¤µà¤°à¥à¤¡ à¤¦obÃ©velopperPlugin à¤•à¤°à¥‡à¤‚',
            'recover' => 'à¤¦à¥‹à¤¬à¤¾à¤°à¤¾ à¤ªà¥à¤°à¤¾à¤ªà¥à¤¤ à¤•à¤°à¥‡à¤‚',
            ////////////////////////////////////////////Dashboard///////////////////////////////////////////////////
            'totalplayers' => 'à¤•à¥à¤² à¤–à¤¿à¤²à¤¾à¤¡à¤¼à¥€',
            'cps' => 'à¤¸à¥€à¤ªà¥€à¤à¤¸ à¤¸à¤°à¥à¤µà¤°',
            'directmessage' => 'à¤¸à¥€à¤§à¤¾ à¤¸à¤‚à¤¦à¥‡à¤¶',
            'userorplayer' => 'à¤‰à¤ªà¤¯à¥‹à¤—à¤•à¤°à¥à¤¤à¤¾ à¤¯à¤¾ à¤–à¤¿à¤²à¤¾à¤¡à¤¼à¥€',
            'message' => 'à¤¸à¤‚à¤¦à¥‡à¤¶',
            'mapmessage' => 'à¤¨à¤•à¥à¤¶à¤¾ à¤¸à¤‚à¤¦à¥‡à¤¶',
            'mapid' => 'à¤¨à¤•à¥à¤¶à¤¾ à¤†à¤ˆà¤¡à¥€',
            'globalmessage' => 'à¤µà¥ˆà¤¶à¥à¤µà¤¿à¤• à¤¸à¤‚à¤¦à¥‡à¤¶',
            'consolecommand' => 'à¤•à¤‚à¤¸à¥‹à¤² à¤•à¤®à¤¾à¤‚à¤¡',
            'command' => 'à¤•à¤®à¤¾à¤‚à¤¡',
            'ban' => 'à¤ªà¥à¤°à¤¤à¤¿à¤¬à¤‚à¤§à¤¿à¤¤',
            'reason' => 'à¤•à¤¾à¤°à¤£',
            'duration' => 'à¤…à¤µà¤§à¤¿ (à¤¦à¤¿à¤¨)',
            'mute' => 'à¤®à¥à¤¯à¥‚à¤Ÿ',
            'unban' => 'à¤ªà¥à¤°à¤¤à¤¿à¤¬à¤‚à¤§ à¤¹à¤Ÿà¤¾à¤¨à¤¾',
            'unmute' => 'à¤®à¥à¤¯à¥‚à¤Ÿ à¤¹à¤Ÿà¤¾à¤¨à¤¾',
            'teleport' => 'à¤Ÿà¥‡à¤²à¥€à¤ªà¥‹à¤°à¥à¤Ÿ',
            'kickuser' => 'à¤‰à¤ªà¤¯à¥‹à¤—à¤•à¤°à¥à¤¤à¤¾ à¤•à¥‹ à¤¨à¤¿à¤•à¤¾à¤²à¥‡à¤‚',
            'Kill' => 'à¤®à¤¾à¤°',
            ////////////////////////////////////////////Sidebar/////////////////////////////////////////////////////
            'home' => 'à¤¹à¥‹à¤®',
            'dashboard' => 'à¤¡à¥ˆà¤¶à¤¬à¥‹à¤°à¥à¤¡',
            'objects' => 'à¤‘à¤¬à¥à¤œà¥‡à¤•à¥à¤Ÿà¥à¤¸',
            'events' => 'à¤†à¤¯à¥‹à¤œà¤¨',
            'quests' => 'à¤•à¥à¤µà¥‡à¤¸à¥à¤Ÿà¥à¤¸',
            'logs' => 'à¤²à¥‰à¤—à¥à¤¸',
            'adminaccounts' => 'à¤µà¥à¤¯à¤µà¤¸à¥à¤¥à¤¾à¤ªà¤• à¤–à¤¾à¤¤à¥‡',
            'config' => 'à¤•à¥‰à¤¨à¥à¤«à¤¼à¤¿à¤—à¤°à¥‡à¤¶à¤¨',
            'maps' => 'à¤¨à¤•à¥à¤¶à¥‡',
            ///////////////////////////////////////Shop Admin/////////////////////////////////////////////////////
            'price' => 'à¤®à¥‚à¤²à¥à¤¯',
            'products' => 'à¤‰à¤¤à¥à¤ªà¤¾à¤¦',
            'description' => 'à¤µà¤¿à¤µà¤°à¤£',
            'action' => 'à¤•à¥à¤°à¤¿à¤¯à¤¾',
            'productpic' => 'à¤‰à¤¤à¥à¤ªà¤¾à¤¦ à¤šà¤¿à¤¤à¥à¤°',
            'addproduct' => 'à¤‰à¤¤à¥à¤ªà¤¾à¤¦ à¤œà¥‹à¤¡à¤¼à¥‡à¤‚',
            'editproduct' => 'à¤‰à¤¤à¥à¤ªà¤¾à¤¦ à¤¸à¤‚à¤ªà¤¾à¤¦à¤¿à¤¤ à¤•à¤°à¥‡à¤‚',
            'edit' => 'à¤¸à¤‚à¤ªà¤¾à¤¦à¤¿à¤¤ à¤•à¤°à¥‡à¤‚',
            /////////////////////////////////////News Admin//////////////////////////////////////////////////////
            'addnews' => 'à¤¸à¤®à¤¾à¤šà¤¾à¤° à¤œà¥‹à¤¡à¤¼à¥‡à¤‚',
            'title' => 'à¤¶à¥€à¤°à¥à¤·à¤•',
            'textnews' => 'à¤¸à¤®à¤¾à¤šà¤¾à¤° à¤Ÿà¥‡à¤•à¥à¤¸à¥à¤Ÿ',
            'newspic' => 'à¤¸à¤®à¤¾à¤šà¤¾à¤° à¤šà¤¿à¤¤à¥à¤°',
            'uploadnews' => 'à¤¸à¤®à¤¾à¤šà¤¾à¤° à¤…à¤ªà¤²à¥‹à¤¡ à¤•à¤°à¥‡à¤‚',
            'date' => 'à¤¤à¤¾à¤°à¥€à¤–',
            ////////////////////////////////////Objects Admin////////////////////////////////////////////////////
            'key' => 'à¤•à¥à¤‚à¤œà¥€',
            ///////////////////////////////////////Logs/////////////////////////////////////////////////////////
            'admin' => 'à¤µà¥à¤¯à¤µà¤¸à¥à¤¥à¤¾à¤ªà¤•',
            'logs' => 'à¤²à¥‰à¤—à¥à¤¸',
            //////////////////////////////////////Admin Accounts////////////////////////////////////////////////
            'addadminaccount' => 'à¤µà¥à¤¯à¤µà¤¸à¥à¤¥à¤¾à¤ªà¤• à¤–à¤¾à¤¤à¤¾ à¤œà¥‹à¤¡à¤¼à¥‡à¤‚',
            /////////////////////////////////////Config/////////////////////////////////////////////////////////
            'gradient' => 'à¤—à¥à¤°à¥‡à¤¡à¤¿à¤à¤‚à¤Ÿ à¤°à¤‚à¤—',
            'analytics' => 'à¤—à¥‚à¤—à¤² à¤µà¤¿à¤¶à¥à¤²à¥‡à¤·à¤¿à¤•à¥€',
            'configdownloadbutton' => 'à¤¡à¤¾à¤‰à¤¨à¤²à¥‹à¤¡ à¤¬à¤Ÿà¤¨',
            'activate' => 'à¤¸à¤•à¥à¤°à¤¿à¤¯ à¤•à¤°à¥‡à¤‚',
            'deactivate' => 'à¤¨à¤¿à¤·à¥à¤•à¥à¤°à¤¿à¤¯ à¤•à¤°à¥‡à¤‚',
            'changelegal' => 'à¤•à¤¾à¤¨à¥‚à¤¨à¥€ à¤¬à¤¦à¤²à¥‡à¤‚',
            'changeterms' => 'à¤¨à¤¿à¤¯à¤® à¤¬à¤¦à¤²à¥‡à¤‚',
            'changeprivacity' => 'à¤—à¥‹à¤ªà¤¨à¥€à¤¯à¤¤à¤¾ à¤¬à¤¦à¤²à¥‡à¤‚',
            'editmenus' => 'à¤®à¥‡à¤¨à¥‚ à¤¸à¤‚à¤ªà¤¾à¤¦à¤¿à¤¤ à¤•à¤°à¥‡à¤‚',
            'change' => 'à¤¬à¤¦à¤²à¥‡à¤‚',
            /////////////////////////////////////Edit Legal////////////////////////////////////////////////////
            'editlegal' => 'à¤•à¤¾à¤¨à¥‚à¤¨à¥€ à¤¸à¤‚à¤ªà¤¾à¤¦à¤¿à¤¤ à¤•à¤°à¥‡à¤‚',
            'textlegal' => 'à¤•à¤¾à¤¨à¥‚à¤¨à¥€ à¤Ÿà¥‡à¤•à¥à¤¸à¥à¤Ÿ',
            ////////////////////////////////////Edit Terms////////////////////////////////////////////////////
            'editterms' => 'à¤¨à¤¿à¤¯à¤® à¤”à¤° à¤¶à¤°à¥à¤¤à¥‹à¤‚ à¤•à¥‹ à¤¸à¤‚à¤ªà¤¾à¤¦à¤¿à¤¤ à¤•à¤°à¥‡à¤‚',
            'textterms' => 'à¤¨à¤¿à¤¯à¤® à¤”à¤° à¤¶à¤°à¥à¤¤à¥‡à¤‚ à¤•à¤¾ à¤Ÿà¥‡à¤•à¥à¤¸à¥à¤Ÿ',
            ///////////////////////////////////Edit Privacity////////////////////////////////////////////////
            'editprivacity' => 'à¤—à¥‹à¤ªà¤¨à¥€à¤¯à¤¤à¤¾ à¤¸à¤‚à¤ªà¤¾à¤¦à¤¿à¤¤ à¤•à¤°à¥‡à¤‚',
            'textprivacity' => 'à¤—à¥‹à¤ªà¤¨à¥€à¤¯à¤¤à¤¾ à¤•à¤¾ à¤Ÿà¥‡à¤•à¥à¤¸à¥à¤Ÿ',
            ////////////////////////////////////Edit Menus//////////////////////////////////////////////////
            'iconlist' => 'à¤†à¤‡à¤•à¤¨ à¤¸à¥‚à¤šà¥€',
            'descriptionmenu' => 'à¤®à¥‡à¤¨à¥‚ à¤•à¤¾ à¤µà¤¿à¤µà¤°à¤£',
            'iconmenu1' => 'à¤†à¤‡à¤•à¤¨ à¤®à¥‡à¤¨à¥‚ 1',
            'iconmenu2' => 'à¤†à¤‡à¤•à¤¨ à¤®à¥‡à¤¨à¥‚ 2',
            'iconmenu3' => 'à¤†à¤‡à¤•à¤¨ à¤®à¥‡à¤¨à¥‚ 3',
            'titlemenu1' => 'à¤Ÿà¤¾à¤‡à¤Ÿà¤² à¤®à¥‡à¤¨à¥‚ 1',
            'titlemenu2' => 'à¤Ÿà¤¾à¤‡à¤Ÿà¤² à¤®à¥‡à¤¨à¥‚ 2',
            'titlemenu2' => 'à¤Ÿà¤¾à¤‡à¤Ÿà¤² à¤®à¥‡à¤¨à¥‚ 3',
            'textmenu1' => 'à¤®à¥‡à¤¨à¥‚ 1 à¤•à¤¾ à¤Ÿà¥‡à¤•à¥à¤¸à¥à¤Ÿ',
            'textmenu2' => 'à¤®à¥‡à¤¨à¥‚ 2 à¤•à¤¾ à¤Ÿà¥‡à¤•à¥à¤¸à¥à¤Ÿ',
            'textmenu3' => 'à¤®à¥‡à¤¨à¥‚ 3 à¤•à¤¾ à¤Ÿà¥‡à¤•à¥à¤¸à¥à¤Ÿ',
            /////////////////////////////////Edit Lang////////////////////////////////////////////////////
            'editlang' => 'à¤­à¤¾à¤·à¤¾ à¤¸à¤‚à¤ªà¤¾à¤¦à¤¿à¤¤ à¤•à¤°à¥‡à¤‚',
            'chooselang' => 'à¤­à¤¾à¤·à¤¾ à¤šà¥à¤¨à¥‡à¤‚',
             ////////////////////////////////Data Tables/////////////////////////////////////////////////
             'search' => 'à¤–à¥‹à¤œà¥‡à¤‚',
             'emptyTable' => 'à¤•à¥‹à¤ˆ à¤œà¤¾à¤¨à¤•à¤¾à¤°à¥€ à¤¨à¤¹à¥€à¤‚ à¤¹à¥ˆ',
             'infotable' => '_START_ à¤¸à¥‡ _END_ à¤•à¥‡ à¤¬à¥€à¤š _TOTAL_ à¤ªà¥à¤°à¤µà¤¿à¤·à¥à¤Ÿà¤¿à¤¯à¤¾à¤‚ à¤¦à¤¿à¤–à¤¾ à¤°à¤¹à¤¾ à¤¹à¥ˆ',
             'infoEmpty' => '0 à¤¸à¥‡ 0 à¤¤à¤• 0 à¤ªà¥à¤°à¤µà¤¿à¤·à¥à¤Ÿà¤¿à¤¯à¤¾à¤‚ à¤¦à¤¿à¤–à¤¾ à¤°à¤¹à¤¾ à¤¹à¥ˆ',
             'infoFiltered' => '(_MAX_ à¤•à¥à¤² à¤ªà¥à¤°à¤µà¤¿à¤·à¥à¤Ÿà¤¿à¤¯à¥‹à¤‚ à¤•à¥€ à¤«à¤¼à¤¿à¤²à¥à¤Ÿà¤° à¤•à¥€ à¤—à¤ˆ)',
             'lengthMenu' => '_MENU_ à¤ªà¥à¤°à¤µà¤¿à¤·à¥à¤Ÿà¤¿à¤¯à¤¾à¤‚ à¤¦à¤¿à¤–à¤¾à¤à¤‚',
             'loadingRecords' => 'à¤²à¥‹à¤¡ à¤¹à¥‹ à¤°à¤¹à¤¾ à¤¹à¥ˆ...',
             'processing' => 'à¤ªà¥à¤°à¥‹à¤¸à¥‡à¤¸à¤¿à¤‚à¤—...',
             'zeroRecords' => 'à¤•à¥‹à¤ˆ à¤ªà¤°à¤¿à¤£à¤¾à¤® à¤¨à¤¹à¥€à¤‚ à¤®à¤¿à¤²à¥‡',
             'first' => 'à¤ªà¤¹à¤²à¤¾',
             'last' => 'à¤†à¤–à¤¿à¤°à¥€',
             'next' => 'à¤…à¤—à¤²à¤¾',
             'previous' => 'à¤ªà¤¿à¤›à¤²à¤¾',
             /////////////////////////////////Panel User///////////////////////////////////////////////////
             'paneluser' => 'à¤‰à¤ªà¤¯à¥‹à¤—à¤•à¤°à¥à¤¤à¤¾ à¤ªà¥ˆà¤¨à¤²',
             'recharge' => 'à¤°à¤¿à¤šà¤¾à¤°à¥à¤œ',
             'reset' => 'à¤°à¥€à¤¸à¥‡à¤Ÿ',
             'player' => 'à¤–à¤¿à¤²à¤¾à¤¡à¤¼à¥€',
             'createticket' => 'à¤Ÿà¤¿à¤•à¤Ÿ à¤¬à¤¨à¤¾à¤à¤‚',
             'tickettext' => 'à¤Ÿà¤¿à¤•à¤Ÿ à¤•à¤¾ à¤Ÿà¥‡à¤•à¥à¤¸à¥à¤Ÿ',
             'addticket' => 'à¤Ÿà¤¿à¤•à¤Ÿ à¤­à¥‡à¤œà¥‡à¤‚',
             'chooseticket' => 'à¤Ÿà¤¿à¤•à¤Ÿ à¤•à¤¾ à¤ªà¥à¤°à¤•à¤¾à¤° à¤šà¥à¤¨à¥‡à¤‚',
             'feedback' => 'à¤ªà¥à¤°à¤¤à¤¿à¤¸à¤¾à¤¦',
             'tickets' => 'à¤Ÿà¤¿à¤•à¤Ÿ',
             'available' => 'à¤‰à¤ªà¤²à¤¬à¥à¤§',
             'updates' => 'à¤…à¤ªà¤¡à¥‡à¤Ÿ',
             'about' => 'à¤•à¥‡ à¤¬à¤¾à¤°à¥‡ à¤®à¥‡à¤‚',
             'balanceavailable' => 'à¤‰à¤ªà¤²à¤¬à¥à¤§ à¤¸à¤‚à¤¤à¥à¤²à¤¨',
             'confirmnewpassword' => 'à¤¨à¤ˆ à¤ªà¤¾à¤¸à¤µà¤°à¥à¤¡ à¤•à¥€ à¤ªà¥à¤·à¥à¤Ÿà¤¿ à¤•à¤°à¥‡à¤‚',
             'newpassword' => 'à¤¨à¤¯à¤¾ à¤ªà¤¾à¤¸à¤µà¤°à¥à¤¡',
             'oldpassword' => 'à¤ªà¥à¤°à¤¾à¤¨à¤¾ à¤ªà¤¾à¤¸à¤µà¤°à¥à¤¡',
             'browser' => 'à¤¬à¥à¤°à¤¾à¤‰à¤œà¤¼à¤°',
             'changepassword' => 'à¤ªà¤¾à¤¸à¤µà¤°à¥à¤¡ à¤¬à¤¦à¤²à¥‡à¤‚',
             'rechargeok' => 'à¤¸à¤«à¤²à¤¤à¤¾ à¤ªà¥‚à¤°à¥à¤µà¤• à¤ªà¥‡à¤®à¥‡à¤‚à¤Ÿ à¤¹à¥‹ à¤—à¤ˆ à¤¹à¥ˆ',
        );









        $ar = array(
            ////////////////////////////////////////////Home////////////////////////////////////////////////////////
            'downloadbutton' => 'Download',
            'onlineplayers' => 'Online-Spieler',
            'listusers' => 'Benutzer auflisten',
            'listplayers' => 'Spieler auflisten',
            'shop' => 'GeschÃ¤ft',
            'news' => 'Nachrichten',
            'register' => 'Registrieren',
            'password' => 'Passwort',
            'confirmpassword' => 'Passwort bestÃ¤tigen',
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
            'terms' => 'GeschÃ¤ftsbedingungen',
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
            'chooselang' => 'Sprache wÃ¤hlen',
             ////////////////////////////////Data Tables/////////////////////////////////////////////////
             'search' => 'Buscar',
             'emptyTable' => 'No hay informaciÃ³n',
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
             'confirmnewpassword' => 'Confirmar Nueva ContraseÃ±a',
             'newpassword' => 'Nueva ContraseÃ±a',
             'oldpassword' => 'ContraseÃ±a Actual',
             'browser' => 'Navegador',
             'changepassword' => 'Cambiar ContraseÃ±a',
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
