<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
            'adminaccounts' => 'Cuentas Administrador',
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
            'writedby' => 'Writed By',
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
            'changeprivacity' => 'Cahange Privacity',
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
            'language' => 'Deyim',
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
            'adminaccounts' => 'Cuentas Administrador',
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
           );
        
                   return array($es, $en, $tr);
    }


}