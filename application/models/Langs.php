<?php 
class Langs extends CI_Model{
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

             
        );














        $zh = array(
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













        $fr = array(
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















        $pt = array(
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










        $hi = array(
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



















    return array($es, $en, $tr, $jp, $de, $ru, $zh, $fr, $pt, $hi, $ar);
    }


}