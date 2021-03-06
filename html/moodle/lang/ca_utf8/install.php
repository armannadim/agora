<?PHP // $Id$ 
      // install.php - created with Moodle 1.9.4+ (Build: 20090225) (2007101541)


$string['admindirerror'] = 'El directori d\'administració especificat és incorrecte';
$string['admindirname'] = 'Directori d\'administració';
$string['admindirsetting'] = 'Alguns servidors web utilitzen un URL especial /admin per accedir a un tauler de control o quelcom semblant. Malauradament aquesta és també la ubicació estàndard de les pàgines d\'administració de Moodle. Podeu arreglar aquest problema canviant el nom del directori d\'administració de Moodle en la vostra instal·lació i posant el nou nom aquí. Per exemple:<br /> <br /><b>moodleadmin</b><br /> <br />
Això modificarà els enllaços d\'administració de Moodle.';
$string['admindirsettinghead'] = 'S\'està configurant el directori d\'administració...';
$string['admindirsettingsub'] = 'Alguns proveïdors d\'espai web utilitzen /admin com una adreça URL especial per accedir a un tauler de control o quelcom semblant. Malauradament això interfereix amb la ubicació estàndard de les pàgines d\'administració de Moodle. Podeu solucionar aquest problema canviant el nom del directori admin en la vostra instal·lació i introduint aquí el nou nom. Per exemple: <br /> <br /><b>moodleadmin</b><br /> <br />
Això repararà tots els enllaços d\'administració de Moodle.';
$string['caution'] = 'Alerta';
$string['chooselanguage'] = 'Trieu un idioma';
$string['chooselanguagehead'] = 'Trieu un idioma';
$string['chooselanguagesub'] = 'Trieu un idioma NOMÉS per a la instal·lació. En una pantalla posterior podreu triar idiomes per al lloc i per als usuaris.';
$string['compatibilitysettings'] = 'S\'estan comprovant els paràmetres del PHP...';
$string['compatibilitysettingshead'] = 'S\'estan comprovant els paràmetres del PHP...';
$string['compatibilitysettingssub'] = 'El vostre servidor hauria de passar totes aquestes proves per tal que Moodle funcioni correctament.';
$string['configfilenotwritten'] = 'La seqüència d\'instal·lació no ha estat capaç de crear automàticament un fitxer config.php que contingui els paràmetres que heu triat, probablement perquè no pugui escriure al directori de Moodle. Podeu copiar a mà el codi següent en un fitxer anomenat config.php dins del directori arrel de Moodle.';
$string['configfilewritten'] = 'S\'ha creat correctament el fitxer config.php';
$string['configurationcomplete'] = 'S\'ha completat la configuració';
$string['configurationcompletehead'] = 'S\'ha completat la configuració';
$string['configurationcompletesub'] = 'Moodle ha intentat desar la configuració en un fitxer en l\'arrel de la vostra instal·lació de Moodle.';
$string['database'] = 'Base de dades';
$string['databasecreationsettings'] = 'Ara cal configurar els paràmetres de la base de dades on s\'emmagatzemara la majoria de dades de Moodle. L\'instal·lador Moodle4Windows crearà automàticament aquesta base de dades amb els paràmetres que especifiqueu aquí.<br /><br /><br />
<b>Tipus:</b> mysql (determinat per l\'instal·lador).<br />
<b>Servidor:</b> localhost (determinat per l\'instal·lador.<br />
<b>Nom:</b> nom de la base de dades, p. ex. moodle.<br />
<b>Usuari:</b> root (determinat per l\'instal·lador).<br />
<b>Contrasenya</b>: la vostra contrasenya per a la base de dades.<br />
<b>Prefix de les taules:</b>: prefix opcional per als noms de les taules.';
$string['databasecreationsettingshead'] = 'Ara cal configurar els paràmetres de la base de dades on s\'emmagatzemaran la majoria de dades de Moodle. L\'instal·lador crearà automàticament aquesta base de dades amb els paràmetres que especifiqueu aquí.';
$string['databasecreationsettingssub'] = '<b>Tipus:</b> fixat a \"mysql\" per l\'instal·lador<br />
<b>Servidor:</b> fixat a \"localhost\" per l\'instal·lador<br />
<b>Nom:</b> nom de la base de dades, p. ex. moodle<br />
<b>Usuari:</b> fixat a \"root\" per l\'instal·lador<br />
<b>Contrasenya:</b> la contrasenya de l\'usuari \"root\" de la base de dades<br />
<b>Prefix de les taules:</b> prefix opcional per utilitzar en els noms de totes les taules';
$string['databasesettings'] = 'Ara cal configurar la base de dades on s\'emmagatzemaran la majoria de dades de Moodle. Aquesta base de dades s\'ha d\'haver creat abans i cal tenir un nom d\'usuari i una contrasenya per accedir-hi.<br />
<br /> <br />
<b>Tipus:</b> mysql o postgres7<br />
<b>Servidor:</b> p. ex. localhost o db.isp.com<br />
<b>Nom:</b> nom de la base de dades, p. ex. moodle<br />
<b>Usuari:</b> nom de l\'usuari de la base de dades<br />
<b>Contrasenya:</b> contrasenya de l\'usuari de la base de dades<br />
<b>Prefix de les taules:</b> prefix opcional per utilitzar en els noms de totes les taules';
$string['databasesettingshead'] = 'Ara cal configurar la base de dades on s\'emmagatzemaran la majoria de dades de Moodle. Aquesta base de dades s\'ha d\'haver creat abans i cal tenir un nom d\'usuari i una contrasenya per accedir-hi.';
$string['databasesettingssub'] = '<b>Tipus:</b> mysql o postgres7<br />
<b>Servidor:</b> p. ex. localhost o db.isp.com<br />
<b>Nom:</b> nom de la base de dades, p. ex. moodle<br />
<b>Usuari:</b> nom de l\'usuari de la base de dades<br />
<b>Contrasenya:</b> contrasenya de l\'usuari de la base de dades<br />
<b>Prefix de les taules:</b> prefix opcional per utilitzar en els noms de totes les taules';
$string['databasesettingssub_mssql'] = '<b>Tipus:</b> SQL*Server (no UTF-8) <b><font color=\"red\">Experimental! (no per a utilitzar en producció)</font></b><br />
<b>Servidor:</b> p. ex. localhost o db.isp.com<br />
<b>Nom:</b> nom de la base de dades, p. ex. moodle<br />
<b>Usuari:</b> el vostre nom d\'usuari de la base de dades<br />
<b>Contrasenya:</b> la vostra contrasenya de la base de dades<br />
<b>Prefix de les taules:</b> prefix que cal anteposar als noms de totes les taules (obligatori)';
$string['databasesettingssub_mssql_n'] = '<b>Tipus:</b> SQL*Server (UTF-8 habilitat)<br />
<b>Servidor:</b> p. ex. localhost o db.isp.com<br />
<b>Nom:</b> nom de la base de dades, p. ex. moodle<br />
<b>Usuari:</b> el vostre nom d\'usuari de la base de dades<br />
<b>Contrasenya:</b> la vostra contrasenya de la base de dades<br />
<b>Prefix de les taules:</b> prefix que cal anteposar als noms de totes les taules (obligatori)';
$string['databasesettingssub_mysql'] = '<b>Tipus:</b> MySQL<br />
<b>Servidor:</b> p. ex. localhost o db.isp.com<br />
<b>Nom:</b> nom de la base de dades, p. ex. moodle<br />
<b>Usuari:</b> el vostre nom d\'usuari de la base de dades<br />
<b>Contrasenya:</b> la vostra contrasenya de la base de dades<br />
<b>Prefix de les taules:</b> prefix que cal anteposar als noms de totes les taules (opcional)';
$string['databasesettingssub_mysqli'] = '<b>Tipus:</b> MySQL Improved<br />
<b>Servidor:</b> p. ex. localhost o db.isp.com<br />
<b>Nom:</b> nom de la base de dades, p. ex. moodle<br />
<b>Usuari:</b> el vostre nom d\'usuari de la base de dades<br />
<b>Contrasenya:</b> la vostra contrasenya de la base de dades<br />
<b>Prefix de les taules:</b> prefix que cal anteposar als noms de totes les taules (opcional)';
$string['databasesettingssub_oci8po'] = '<b>Tipus:</b> Oracle<br />
<b>Servidor:</b> no utilitzat, s\'ha de deixar en blanc<br />
<b>Nom:</b> nom de la connexió tnsnames.ora<br />
<b>Usuari:</b> el vostre nom d\'usuari de la base de dades<br />
<b>Contrasenya:</b> la vostra contrasenya de la base de dades<br />
<b>Prefix de les taules:</b> prefix que cal anteposar als noms de totes les taules (obligatori, màxim 2 caràcters)';
$string['databasesettingssub_odbc_mssql'] = '<b>Tipus:</b> SQL*Server (sobre ODBC) <b><font color=\"red\">Experimental! (no per a utilitzar en producció)</font></b><br />
<b>Servidor:</b> nom del DSN al tauler de control de l\'ODBC<br />
<b>Nom:</b> nom de la base de dades, p. ex. moodle<br />
<b>Usuari:</b> el vostre nom d\'usuari de la base de dades<br />
<b>Contrasenya:</b> la vostra contrasenya de la base de dades<br />
<b>Prefix de les taules:</b> prefix que cal anteposar als noms de totes les taules (obligatori)';
$string['databasesettingssub_postgres7'] = '<b>Tipus:</b> PostgreSQL<br />
<b>Servidor:</b> p. ex. localhost o db.isp.com<br />
<b>Nom:</b> nom de la base de dades, p. ex. moodle<br />
<b>Usuari:</b> el vostre nom d\'usuari de la base de dades<br />
<b>Contrasenya:</b> la vostra contrasenya de la base de dades<br />
<b>Prefix de les taules:</b> prefix que cal anteposar als noms de totes les taules (obligatori)';
$string['databasesettingswillbecreated'] = '<strong>Nota</strong >: l\'instal·lador intentarà crear automàticament la base de dades si no existeix.';
$string['dataroot'] = 'Directori de dades';
$string['datarooterror'] = 'No s\'ha pogut trobar o crear el directori de dades que heu especificat. Corregiu el camí o creeu el directori a mà.';
$string['datarootpublicerror'] = 'El directori de dades que heu especificat és accessible directament per web. Utilitzeu una altra ubicació.';
$string['dbconnectionerror'] = 'No es pot obrir la connexió amb la base de dades que heu especificat. Comproveu els paràmetres de la base de dades.';
$string['dbcreationerror'] = 'Error en la creació de la base de dades. No s\'ha pogut crear la base de dades amb els paràmetres proporcionats.';
$string['dbhost'] = 'Ordinador servidor';
$string['dbpass'] = 'Contrasenya';
$string['dbprefix'] = 'Prefix de taules';
$string['dbtype'] = 'Tipus';
$string['dbwrongencoding'] = 'La base de dades que heu seleccionat està funcionant amb una codificació ($a) no recomanada. Seria millor utilitzar una base de dades amb codificació Unicode (UTF-8). De totes maneres, podeu deixar de banda aquesta prova si seleccioneu més avall \"Omet la prova de codificació de la base de dades\", però podríeu experimentar problemes en el futur.';
$string['dbwronghostserver'] = 'Heu de seguir les regles referents al servidor, exposades més amunt.';
$string['dbwrongnlslang'] = 'La variable d\'entorn NLS_LANG del vostre servidor web ha d\'utilitzar el joc de caràcters AL32UTF8. Consulteu la documentació de PHP sobre la configuració correcta d\'OCI8.';
$string['dbwrongprefix'] = 'Heu de seguir les regles referents al prefix de les taules, exposades més amunt.';
$string['directorysettings'] = '<p>Confirmeu les ubicacions d\'aquesta instal·lació de Moodle.</p>

<p><b>Adreça web:</b>
Especifiqueu l\'adreça web completa per a accedir a Moodle. Si el vostre lloc és accessible per mitjà de diversos URL, trieu el més natural per als estudiants. No inclogueu la barra final.</p>

<p><b>Directori de Moodle:</b>
Especifiqueu el camí complet del directori d\'aquesta instal·lació. Assegureu-vos que les majúscules/minúscules són correctes.</p>

<p><b>Directori de dades:</b>
Necessiteu un lloc on Moodle pugui desar els fitxers que es pengin. L\'usuari del servidor web (generalment \'nobody\' o \'apache\') ha de tenir permisos de lectura i d\'ESCRIPTURA en aquest directori, però no hauria de ser accessible directament per web.</p>';
$string['directorysettingshead'] = 'Confirmeu les ubicacions d\'aquesta instal·lació de Moodle.';
$string['directorysettingssub'] = '<b>Adreça web:</b>
Especifiqueu l\'adreça web completa per a accedir a Moodle. Si el vostre lloc és accessible per mitjà de diversos URL, trieu el més natural per als estudiants. No inclogueu la barra final.</p>
<br /><br />
<b>Directori de Moodle:</b>
Especifiqueu el camí complet del directori d\'aquesta instal·lació. Assegureu-vos que les majúscules/minúscules són correctes.</p>
<br /><br />
<b>Directori de dades:</b>
Necessiteu un lloc on Moodle pugui desar els fitxers que es pengin. L\'usuari del servidor web (generalment \'nobody\' o \'apache\') ha de tenir permisos de lectura i d\'ESCRIPTURA en aquest directori, però no hauria de ser accessible directament via web.</p>';
$string['dirroot'] = 'Directori de Moodle';
$string['dirrooterror'] = 'El paràmetre \'Directori de Moodle\' sembla incorrecte: no s\'hi ha pogut trobat cap instal·lació de Moodle. S\'ha reiniciat el valor del paràmetre.';
$string['download'] = 'Baixa';
$string['downloadlanguagebutton'] = 'Baixa el paquet d\'idioma \"$a\"';
$string['downloadlanguagehead'] = 'Baixa paquet d\'idioma';
$string['downloadlanguagenotneeded'] = 'Podeu continuar el procés d\'instal·lació amb el paquet d\'idioma per defecte \"$a\".';
$string['downloadlanguagesub'] = 'Ara teniu l\'opció de baixar un paquet d\'idioma i continuar el procés d\'instal·lació en aquest idioma.<br /><br />Si no podeu baixar el paquet, el procés d\'instal·lació prosseguirà en anglès. (Després que s\'hagi completat la instal·lació, tindreu l\'oportunitat de baixar i instal·lar paquets d\'idioma addicionals.)';
$string['environmenthead'] = 'S\'està comprovant el vostre entorn';
$string['environmentsub'] = 'S\'està comprovant si els diferents components del vostre sistema satisfan els requeriments';
$string['fail'] = 'Error';
$string['fileuploads'] = 'Càrrega de fitxers';
$string['fileuploadserror'] = 'Hauria d\'estar habilitada';
$string['fileuploadshelp'] = '<p>Sembla que la càrrega de fitxers està inhabilitada al vostre servidor.</p>

<p>Moodle es pot instal·lar igualment, però sense aquesta capacitat no podreu penjar fitxers als cursos o imatges dels usuaris.</p>

<p>Per habilitar la càrrega de fitxers cal editar el fitxer php.ini principal del sistema i posar el paràmetre <b>file_uploads</b> a \'1\'.</p>';
$string['gdversion'] = 'Versió GD';
$string['gdversionerror'] = 'La biblioteca GD hauria d\'estar present per processar i crear imatges';
$string['gdversionhelp'] = '<p>Sembla que el vostre servidor no té instal·lat el GD.</p>

<p>GD és una biblioteca requerida pel PHP per tal que Moodle pugui processar imatges (p. ex. les icones dels perfils d\'usuari) i crear imatges noves (p. ex. els gràfics dels registres d\'activitat). Moodle pot funcionar sense GD, però aquestes característiques no estaran disponibles.</p>

<p>Per afegir GD al PHP en Unix, compileu el PHP amb el paràmetre --with-gd.</p>

<p>En Windows generalment es pot editar el fitxer php.ini i treure el comentari de la línia que porti la referència a php_gd2.dll.</p>';
$string['globalsquotes'] = 'Gestió insegura dels globals';
$string['globalsquoteserror'] = 'Arregleu els paràmetres del vostre PHP: inhabiliteu register_globals i/o habiliteu magic_quotes_gpc';
$string['globalsquoteshelp'] = '<p>No s\'aconsella tenir inhabilitat Magic Quotes GPC i tenir alhora habilitat Register Globals.</p>

<p>La configuració recomanada és <b>magic_quotes_gpc = On</b> i <b>register_globals = Off</b> en el fitxer php.ini</p>

<p>Si no teniu accés al php.ini, potser podreu afegir les línies següents en un fitxer anomenat .htaccess dins del directori Moodle:
<blockquote>php_value magic_quotes_gpc On</blockquote>
<blockquote>php_value register_globals Off</blockquote>
</p>';
$string['installation'] = 'Instal·lació';
$string['langdownloaderror'] = 'Dissortadament l\'idioma \"$a\" no està instal·lat. La instal·lació prosseguirà en anglès.';
$string['langdownloadok'] = 'L\'dioma \"$a\" s\'ha instal·lat amb èxit. La instal·lació prosseguirà en aquest idioma.';
$string['magicquotesruntime'] = 'Magic Quotes Run Time';
$string['magicquotesruntimeerror'] = 'Hauria d\'estar desactivat';
$string['magicquotesruntimehelp'] = '<p>Aquest paràmetre hauria d\'estar desactivat per tal que Moodle funcioni correctament.</p>

<p>Normalment està desactivat per defecte. Comproveu el valor de <b>magic_quotes_runtime</b> al vostre fitxer php.ini.</p>

<p>Si no teniu accés al php.ini, hauríeu de col·locar la línia següent en un fitxer anomenat .htaccess dins del directori de Moodle:
<blockquote>php_value magic_quotes_runtime Off</blockquote>
</p>';
$string['memorylimit'] = 'Límit de memòria';
$string['memorylimiterror'] = 'El límit de memòria del PHP està definit una mica baix. Podeu tenir problemes més endavant.';
$string['memorylimithelp'] = '<p>El límit de memòria del PHP del vostre servidor actualment està definit en $a.</p>

<p>Això pot causar que Moodle tingui problemes de memòria més endavant, especialment si teniu molts mòduls habilitats i/o molts usuaris.</p>

<p>És recomanable que configureu el PHP amb un límit superior, com ara 40 MB, sempre que sigui possible. Hi ha diverses maneres de fer això:</p>
<ol>
<li>Si podeu, recompileu el PHP amb <i>--enable-memory-limit</i>. Això permetrà que Moodle defineixi el límit de memòria per si mateix.</li>
<li>Si teniu accés al fitxer php.ini, podeu canviar el paràmetre <b>memory_limit</b> a 40 MB. Si no hi teniu accés podeu demanar al vostre administrador que ho faci ell.</li>
<li>En alguns servidors PHP podeu crear un fitxer .htaccess dins del directori de Moodle amb aquesta línia:
<p><blockquote>php_value memory_limit 40M</blockquote></p>
<p>Tanmateix, en alguns servidors això farà que no funcioni <b>cap</b> pàgina PHP (es visualitzaran errors) en el qual cas hauríeu de suprimir el fitxer .htaccess.</p></li>
</ol>';
$string['mssql'] = 'SQL*Server (mssql)';
$string['mssql_n'] = 'SQL*Server amb UTF-8 (mssql_n)';
$string['mssqlextensionisnotpresentinphp'] = 'El PHP no s\'ha configurat correctament amb l\'extensió MSSQL de manera que pugui comunicar-se amb SQL*Server. Reviseu el fitxer php.ini o recompileu PHP.';
$string['mysql'] = 'MySQL (mysql)';
$string['mysqlextensionisnotpresentinphp'] = 'El PHP no s\'ha configurat correctament amb l\'extensió MySQL de manera que pugui comunicar-se amb MySQL. Reviseu el fitxer php.ini o recompileu el PHP.';
$string['mysqli'] = 'MySQL Improved (mysqli)';
$string['mysqliextensionisnotpresentinphp'] = 'El PHP no ha estat configurat adequadament amb l\'extensió MySQLi de manera que pugui comunicar-se amb MySQL. Reviseu el fitxer php.ini o recompileu el PHP. L\'extensió MySQLi no està disponible per a PHP 4.';
$string['oci8po'] = 'Oracle (oci8po)';
$string['ociextensionisnotpresentinphp'] = 'El PHP no s\'ha configurat correctament amb l\'extensió OCI8 de manera que pugui comunicar-se amb Oracle. Reviseu el fitxer php.ini o recompileu el PHP.';
$string['odbc_mssql'] = 'SQL*Server over ODBC (odbc_mssql)';
$string['odbcextensionisnotpresentinphp'] = 'El PHP no s\'ha configurat correctament amb l\'extensió ODBC de manera que pugui comunicar-se amb Oracle. Reviseu el fitxer php.ini o recompileu el PHP.';
$string['pass'] = 'Correcte';
$string['pgsqlextensionisnotpresentinphp'] = 'El PHP no s\'ha configurat correctament amb l\'extensió PGSQL de manera que pugui comunicar-se amb PostgreSQL. Reviseu el fitxer php.ini o recompileu el PHP.';
$string['phpversion'] = 'Versió PHP';
$string['phpversionerror'] = 'La versió del PHP ha de ser com a mínim la 4.1.0';
$string['phpversionhelp'] = '<p>Moodle necessita la versió de PHP 4.1.0 o posterior.</p>
<p>A hores d\'ara esteu utilitzant la versió $a.</p>
<p>Us caldrà actualitzar el PHP o traslladar Moodle a un ordinador amb una versió de PHP més recent.</p>';
$string['postgres7'] = 'PostgreSQL (postgres7)';
$string['postgresqlwarning'] = '<strong>Nota:</strong> Si experimenteu problemes de connexió, podeu provar a deixar en blanc els camps de base de dades, usuari i contrasenya i definir el camp de servidor així: host=\'postgresql_host\' port=\'5432\' dbname=\'postgresql_database_name\' user=\'postgresql_user\' password=\'postgresql_user_password\'. Més informació en <a href=\"http://docs.moodle.org/en/Installing_Postgres_for_PHP\">Moodle Docs</a>';
$string['safemode'] = 'Mode segur';
$string['safemodeerror'] = 'Moodle pot tenir problemes amb el mode segur activat';
$string['safemodehelp'] = '<p>Moodle pot tenir diversos problemes amb el mode segur activat. Probablement no podrà crear fitxers nous.</p>

<p>Normalment el mode segur només està habilitat en servidors webs públics una mica paranoics, de manera que és probable que hàgiu de buscar un altre servei d\'allotjament per al vostre Moodle.</p>

<p>Podeu continuar la instal·lació si voleu, però trobareu problemes de funcionament més endavant.</p>';
$string['sessionautostart'] = 'Autoinici de sessió';
$string['sessionautostarterror'] = 'Hauria d\'estar desactivat';
$string['sessionautostarthelp'] = '<p>Moodle necessita suport per a sessions i no funcionarà sense.</p>

<p>Les sessions es poden habilitar en el fitxer php.ini. Comproveu el paràmetre session.auto_start.</p>';
$string['skipdbencodingtest'] = 'Omet la prova de codificació de la base de dades';
$string['welcomep10'] = '$a->installername ($a->installerversion)';
$string['welcomep20'] = 'Esteu veient aquesta pàgina perquè heu instal·lat amb èxit i heu executat el paquet <strong>$a->packname $a->packversion</strong>. Felicitacions!';
$string['welcomep30'] = 'Aquesta versió de <strong>$a->installername</strong> inclou les aplicacions necessàries per crear un entorn en el qual funcioni <strong>Moodle</strong>:';
$string['welcomep40'] = 'El paquet inclou també <strong>Moodle $a->moodlerelease ($a->moodleversion)</strong>.';
$string['welcomep50'] = 'L\'ús de totes les aplicacions d\'aquest paquet és governat per les seves llicències respectives. El paquet <strong>$a->installername</strong> complet és 
<a href=\"http://www.opensource.org/docs/definition_plain.html\">codi font obert</a> i es distribueix 
sota llicència <a href=\"http://www.gnu.org/copyleft/gpl.html\">GPL</a>.';
$string['welcomep60'] = 'Les pàgines següents us guiaran per una sèrie de passos fàcils de seguir per configurar <strong>Moodle</strong> en el vostre ordinador. Podeu acceptar els paràmetres per defecte o, opcionalment, modificar-los perquè s\'ajustin a les vostres necessitats.';
$string['welcomep70'] = 'Feu clic en el botó \"Següent\" per continuar la configuració de <strong>Moodle</strong>.';
$string['wwwroot'] = 'Adreça web';
$string['wwwrooterror'] = 'L\'adreça web no sembla vàlida. La instal·lació de Moodle no sembla que sigui en aquesta ubicació,';
$string['aborting'] = 'S\'està interrompent la instal·lació'; // ORPHANED
$string['adminemail'] = 'Correu electrònic:'; // ORPHANED
$string['adminfirstname'] = 'Nom:'; // ORPHANED
$string['admininfo'] = 'Dades de l\'administrador'; // ORPHANED
$string['adminlastname'] = 'Cognoms:'; // ORPHANED
$string['adminpassword'] = 'Contrasenya:'; // ORPHANED
$string['adminusername'] = 'Nom d\'usuari/ària'; // ORPHANED
$string['askcontinue'] = 'Continua (sí/no)'; // ORPHANED
$string['availabledbtypes'] = 'Tipus de base de dades disponibles'; // ORPHANED
$string['availablelangs'] = 'Llista d\'idiomes disponibles'; // ORPHANED
$string['cannotconnecttodb'] = 'No es pot obrir la connexió amb la base de dades'; // ORPHANED
$string['checkingphpsettings'] = 'S\'estan comprovant els paràmetres del PHP'; // ORPHANED
$string['configfilecreated'] = 'El fitxer de configuració s\'ha creat correctament'; // ORPHANED
$string['configfiledoesnotexist'] = 'El fitxer de configuració no existeix'; // ORPHANED
$string['configurationfileexist'] = 'Ja existeix un fitxer de configuració'; // ORPHANED
$string['creatingconfigfile'] = 'S\'està  creant el fitxer de configuració...'; // ORPHANED
$string['databasehost'] = 'Servidor de base de dades:'; // ORPHANED
$string['databasename'] = 'Nom de la base de dades:'; // ORPHANED
$string['databasepass'] = 'Contrasenya de la base de dades:'; // ORPHANED
$string['databasesettingsformoodle'] = 'Paràmetres de la base de dades de Moodle'; // ORPHANED
$string['databasesettingssub_sqlite3_pdo'] = '<b>Tipus:</b> SQLite 3 (PDO) <b><strong class=\"errormsg\">Experimental! (no l\'utilitzeu en producció)</strong></b><br />
<b>Servidor:</b> camí (complet) del directori on es desarà el fitxer de la base de dades; en blanc o localhost per utilitzar el directori de dades de Moodle<br />
<b>Nom:</b> nom de la base de dades, p. ex. moodle (opcional)<br />
<b>Usuari:</b> el vostre nom d\'usuari de la base de dades (opcional)<br />
<b>Contrasenya:</b> la vostra contrasenya de la base de dades (opcional)<br />
<b>Prefix de les taules:</b> prefix que cal anteposar als noms de totes les taules (obligatori)<br />
El nom del fitxer de la base de dades es determinarà mitjançant el nom d\'usuari, el nom de la base de dades i la contrasenya que definiu més amunt.'; // ORPHANED
$string['databasetype'] = 'Tipus de base de dades:'; // ORPHANED
$string['databaseuser'] = 'Usuari de la base de dades:'; // ORPHANED
$string['disagreelicense'] = 'No es pot continuar l\'actualització sense acceptar la GPL.'; // ORPHANED
$string['downloadlanguagepack'] = 'Voleu baixar ara el paquet d\'idioma (sí/no)?'; // ORPHANED
$string['downloadsuccess'] = 'El paquet d\'idioma s\'ha baixat correctament'; // ORPHANED
$string['doyouagree'] = 'Esteu d\'acord (sí/no)?'; // ORPHANED
$string['errorsinenvironment'] = 'Hi ha errors en l\'entorn.'; // ORPHANED
$string['inputdatadirectory'] = 'Directori de dades:'; // ORPHANED
$string['inputwebadress'] = 'Adreça web:'; // ORPHANED
$string['inputwebdirectory'] = 'Directori de Moodle'; // ORPHANED
$string['installationiscomplete'] = 'S\'ha completat la instal·lació'; // ORPHANED
$string['invalidargumenthelp'] = 'Error: els arguments no són vàlids.
Ús: \$ php cliupgrade.php OPCIONS
Utilitzeu l\'opció --help per a més informació'; // ORPHANED
$string['invalidemail'] = 'L\'adreça de correu no és vàlida'; // ORPHANED
$string['invalidhost'] = 'El servidor no és vàlid'; // ORPHANED
$string['invalidint'] = 'Error: el valor no és un enter'; // ORPHANED
$string['invalidintrange'] = 'Error: el valor és fora dels límits'; // ORPHANED
$string['invalidpath'] = 'El camí no és vàlid'; // ORPHANED
$string['invalidsetelement'] = 'Error: el valor que heu proporcionat no coincideix amb cap de les opcions permeses'; // ORPHANED
$string['invalidtextvalue'] = 'El text no és vàlid'; // ORPHANED
$string['invalidurl'] = 'L\'URL no és vàlid'; // ORPHANED
$string['invalidvalueforlanguage'] = 'El valor no és vàlid per a l\'opció --lang. Utilitzeu --help per a més informació'; // ORPHANED
$string['invalidyesno'] = 'Error: el valor no és un argument vàlid sí/no.'; // ORPHANED
$string['locationanddirectories'] = 'Ubicació i directoris'; // ORPHANED
$string['php52versionerror'] = 'La versió de PHP ha de ser 5.2.0 o superior'; // ORPHANED
$string['php52versionhelp'] = '<p>Moodle requereix una versió de PHP 5.2.0 o superior.</p>
<p>A hores d\'ara esteu utilitzant la versió $a.</p>
<p>Heu d\'actualitzar el PHP o canviar de servidor.</p>'; // ORPHANED
$string['releasenoteslink'] = 'Per a més informació sobre aquesta versió de Moodle, consulteu les Notes de llançament en $a'; // ORPHANED
$string['selectlanguage'] = 'Selecció d\'idioma per a la instal·lació'; // ORPHANED
$string['sitefullname'] = 'Nom complet del lloc'; // ORPHANED
$string['siteinfo'] = 'Detalls del lloc'; // ORPHANED
$string['sitenewsitems'] = 'Titulars de notícies:'; // ORPHANED
$string['siteshortname'] = 'Nom curt del lloc:'; // ORPHANED
$string['sitesummary'] = 'Resum del lloc:'; // ORPHANED
$string['sqlite3_pdo'] = 'SQLite 3 (PDO) <b><strong class=\"errormsg\">Experimental! (no l\'utilitzeu en producció)</strong></b>'; // ORPHANED
$string['sqliteextensionisnotpresentinphp'] = 'El PHP no ha estat configurat correctament amb l\'extensió SQLite. Reviseu el fitxer php.ini o torneu a compilar el PHP.'; // ORPHANED
$string['tableprefix'] = 'Prefix de taules:'; // ORPHANED
$string['upgradingactivitymodule'] = 'S\'està actualitzant el mòdul d\'activitat'; // ORPHANED
$string['upgradingbackupdb'] = 'S\'està actualitzant la base de dades de còpies de seguretat'; // ORPHANED
$string['upgradingblocksdb'] = 'S\'està actualitzant la base de dades de blocs'; // ORPHANED
$string['upgradingblocksplugin'] = 'S\'està actualitzant el connector de blocs'; // ORPHANED
$string['upgradingcompleted'] = 'S\'ha completat l\'actualització...'; // ORPHANED
$string['upgradingcourseformatplugin'] = 'S\'està actualitzant el connector de format de curs'; // ORPHANED
$string['upgradingenrolplugin'] = 'S\'està actualitzant el connector d\'inscripcions'; // ORPHANED
$string['upgradinggradeexportplugin'] = 'S\'està actualitzant el connector d\'exportació de qualificacions'; // ORPHANED
$string['upgradinggradeimportplugin'] = 'S\'està actualitzant el connector d\'importació de qualificacions'; // ORPHANED
$string['upgradinggradereportplugin'] = 'S\'està actualitzant el connector d\'informes de qualificacions'; // ORPHANED
$string['upgradinglocaldb'] = 'S\'està actualitzant la base de dades local'; // ORPHANED
$string['upgradingmessageoutputpluggin'] = 'S\'està actualitzant el connector de sortida de missatges'; // ORPHANED
$string['upgradingqtypeplugin'] = 'S\'està actualitzant el connector de tipus de preguntes'; // ORPHANED
$string['upgradingrpcfunctions'] = 'S\'estan actualitzant les funcions RPC'; // ORPHANED
$string['usagehelp'] = 'Sinopsi:
$php cliupgrade.php OPCIONS

OPCIONS
--lang Idioma vàlid instal·lat per a la instal·lació. Per defecte anglès (en)
--webaddr Adreça web per al lloc Moodle
--moodledir Ubicació del directori web de moodle
--datadir Ubicació del directori de dades de moodle (no hauria de ser visible per web)
--dbtype Tipus de base de dades. Per defecte mysql
--dbhost Servidor de la base de dade. Per defecte localhost
--dbname Nom de la base de dades. Per defecte moodle
--dbuser Usuari d\'accés a la base de dades. Per defecte en blanc
--dbpass Contrasenya d\'accés a la base de dades. Per defecte en blanc
--prefix Prefix de les taules de la base de dades. Per defecte mdl
--verbose 0 sense sortida, 1 sortida resumida (per defecte), 2 sortida detallada
--interactivelevel 0 no interactiu, 1 semiinteractiu (per defecte), 2 interactiu
--agreelicense Yes (per defecte) o No
--confirmrelease Yes (per defecte) o No
--sitefullname Nom complet del lloc. Per defecte: Moodle Site (canvieu-lo!)
--siteshortname Nom curt del lloc. Per defecte: moodle
--sitesummary Resum del lloc. Per defecte en blanc
--adminfirstname Nom de l\'administrador/a. Per defecte Admin
--adminlastname Cognom de l\'administrador/a. Per defecte User
--adminusername Nom d\'usuari/ària de l\'administrador/a. Per defecte admin
--adminpassword Contrasenya de l\'administrador/a. Per defecte admin
--adminemail Correu electrònic de l\'administrador/a. Per defecte root@localhost
--help mostra aquesta ajuda

Ús:
$php cliupgrade.php --lang=en --webaddr=http://www.example.com --moodledir=/var/www/html/moodle --datadir=/var/moodledata --dbtype=mysql --dbhost=localhost --dbname=moodle --dbuser=root --prefix=mdl --agreelicense=yes --confirmrelease=yes --sitefullname=\"Lloc Moodle de mostra\" --siteshortname=moodle --sitesummary=siteforme --adminfirstname=Admin --adminlastname=User --adminusername=admin --adminpassword=admin --adminemail=admin@example.com --verbose=1 --interactivelevel=2'; // ORPHANED
$string['versionerror'] = 'L\'usuari ha interromput per un error de versió'; // ORPHANED
$string['welcometext'] = '--- Benvinguts a l\'instal·lador de línia d\'ordres de Moodle ---'; // ORPHANED
$string['writetoconfigfilefaild'] = 'Error: no s\'ha pogut escriure el fitxer de configuració'; // ORPHANED
$string['yourchoice'] = 'La vostra elecció:'; // ORPHANED

?>
