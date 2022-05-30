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