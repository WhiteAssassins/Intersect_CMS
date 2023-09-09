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