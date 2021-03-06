<?PHP // $Id$ 
      // forum.php - created with Moodle 1.9.4+ (Build: 20090225) (2007101541)


$string['addanewdiscussion'] = 'Afegeix un nou tema de debat';
$string['addanewquestion'] = 'Afegeix una nova pregunta';
$string['addanewtopic'] = 'Afegeix un nou tema';
$string['advancedsearch'] = 'Cerca avançada';
$string['aggregateavg'] = 'Mitjana de valoracions';
$string['aggregatecount'] = 'Nombre de valoracions';
$string['aggregatecountformat'] = '$a->count (qualificació: $a->grade)';
$string['aggregatemax'] = 'Valoració màxima';
$string['aggregatemin'] = 'Valoració mínima';
$string['aggregatenone'] = 'Sense valorar';
$string['aggregatesum'] = 'Suma de valoracions';
$string['aggregatetype'] = 'Tipus d\'agregació';
$string['ajaxrating'] = 'Habilita valoracions AJAX';
$string['allforums'] = 'Tots els fòrums';
$string['allowchoice'] = 'Permet triar a tothom';
$string['allowdiscussions'] = 'Pot un $a enviar un missatge a aquest fòrum?';
$string['allowratings'] = 'Permeteu valorar els missatges?';
$string['allowsallsubscribe'] = 'Aquest fòrum permet que cadascú triï si vol subscriure\'s o no.';
$string['allowsdiscussions'] = 'Aquest fòrum permet iniciar a tothom un tema de debat.';
$string['allsubscribe'] = 'Subscriu-me a tots els fòrums';
$string['allunsubscribe'] = 'Cancel·la la subscripció a tots els fòrums';
$string['anyfile'] = 'Qualsevol fitxer';
$string['attachment'] = 'Fitxer adjunt';
$string['blockafter'] = 'Llindar de missatges per blocar';
$string['blockperiod'] = 'Període de temps per blocar';
$string['blockperioddisabled'] = 'No bloquis';
$string['bynameondate'] = 'per $a->name - $a->date';
$string['cannotadddiscussion'] = 'Afegir debats en aquest fòrum requereix pertànyer al grup.';
$string['cannotadddiscussionall'] = 'No teniu permís per a afegir un nou tema de debat per a tots els participants.';
$string['cannotviewpostyet'] = 'Encara no podeu llegir les preguntes d\'altres estudiants en aquest debat perquè no hi heu enviat cap missatge';
$string['cleanreadtime'] = 'Hora per a marcar els missatges vells com a llegits';
$string['configajaxrating'] = 'Les valoracions AJAX constitueixen una millora d\'usabilitat del sistema de valoracions dels fòrums. Si habiliteu aquesta opció, els usuaris podran valorar els missatges del fòrum quasi instantàniament, sense necessitat de desplaçar-se al capdavall de la pàgina i fer clic al botó \'Envia les meves darreres valoracions\'. Aquest paràmetre requereix que l\'AJAX estigui habilitat al lloc i en el perfil dels usuaris.';
$string['configcleanreadtime'] = 'L\'hora del dia per a netejar missatges vells de la taula de missatges llegits.';
$string['configdisplaymode'] = 'El mode de visualització per defecte dels debats si no se n\'especifica un.';
$string['configenablerssfeeds'] = 'Aquest commutador habilitarà la possibilitat de tenir RSS en tots els fòrums. Haureu d\'activar l\'RSS en els paràmetres de cada fòrum.';
$string['configenabletimedposts'] = 'Aquesta opció permet definir un període de visualització quan es crea un nou debat en un fòrum (característica experimental)';
$string['configlogblocked'] = 'El cron del fòrum pot registrar els intents blocats d\'enviar correu a usuaris amb el correu inhabilitat.';
$string['configlongpost'] = 'Qualsevol missatge per damunt d\'aquesta mida (exclòs l\'HTML) es considera massa llarg.';
$string['configmanydiscussions'] = 'Nombre màxim de debats per pàgina';
$string['configmaxbytes'] = 'Mida màxima per defecte per a tots els fitxers adjuntats als fòrums d\'aquest lloc (subjecte als límits de cada curs i altres paràmetres locals)';
$string['configoldpostdays'] = 'Nombre de dies que han de passar per a donar per llegit un missatge.';
$string['configreplytouser'] = 'Quan s\'envia per correu un missatge d\'un fòrum, ha de portar l\'adreça de l\'usuari com a remitent de manera que els destinataris puguin contestar-li privadament per correu? Encara que s\'especifiqui així, els usuaris poden triar en el seu perfil de mantenir oculta l\'adreça de correu.';
$string['configshortpost'] = 'Qualsevol missatge per sota d\'aquesta mida (exclòs l\'HTML) es considera massa breu.';
$string['configtrackreadposts'] = 'Poseu \'sí\' per fer el seguiment dels missatges llegits/no llegits per cada usuari.';
$string['configusermarksread'] = '\'Sí\' vol dir que l\'usuari ha de marcar el missatge com a llegit. \'No\' vol dir que en llegir un missatge es marca automàticament com a llegit.';
$string['couldnotadd'] = 'Un error desconegut ha impedit afegir el vostre missatge';
$string['couldnotdeleteratings'] = 'No es pot suprimir perquè ja l\'han valorat altres persones';
$string['couldnotdeletereplies'] = 'No es pot suprimir perquè ja l\'han contestat altres persones';
$string['couldnotupdate'] = 'Un error desconegut ha impedit actualitzar el vostre missatge';
$string['delete'] = 'Suprimeix';
$string['deleteddiscussion'] = 'El tema de debat s\'ha suprimit';
$string['deletedpost'] = 'El missatge s\'ha suprimit';
$string['deletedposts'] = 'Aquests missatges s\'han suprimit';
$string['deletesure'] = 'Segur que voleu suprimir aquest missatge?';
$string['deletesureplural'] = 'Segur que voleu suprimir aquest missatges i totes les seves respostes? ($a missatges)';
$string['digestmailheader'] = 'Aquest és el vostre resum diari de missatges enviats als fòrums de $a->sitename. Si voleu canviar les vostres preferències de correu dels fòrums, aneu a $a->userprefs.';
$string['digestmailprefs'] = 'el vostre perfil d\'usuari';
$string['digestmailsubject'] = 'Resum diari de missatges $a';
$string['digestsentusers'] = 'S\'han enviat amb èxit els resums de correu de: $a usuaris.';
$string['disallowsubscribe'] = 'No es permeten subscripcions';
$string['disallowsubscribeteacher'] = 'No es permeten subscripcions (excepte al professorat)';
$string['discussion'] = 'Debat';
$string['discussionmoved'] = 'Aquest debat s\'ha traslladat a \'$a\'.';
$string['discussionmovedpost'] = 'Aquest debat s\'ha traslladat <a href=\"$a->discusshref\">aquí</a> dins del fòrum <a href=\"$a->forumhref\">$a->forumname</a>';
$string['discussionname'] = 'Títol del debat';
$string['discussions'] = 'Debats';
$string['discussionsstartedby'] = 'Debats iniciats per $a';
$string['discussionsstartedbyrecent'] = 'Debats iniciats recentment per $a';
$string['discussthistopic'] = 'Debat aquest tema';
$string['displayend'] = 'Fi de la visualització';
$string['displaymode'] = 'Mode visualització';
$string['displayperiod'] = 'Període de visualització';
$string['displaystart'] = 'Inici de la visualització';
$string['eachuserforum'] = 'Cada persona inicia un debat';
$string['edit'] = 'Edita';
$string['editedby'] = 'Editat per $a->name - $a->date';
$string['editing'] = 'S\'està editant';
$string['emptymessage'] = 'El vostre missatge presentava algun problema. Potser l\'havíeu deixat en blanc, o el fitxer adjunt era massa gran. Els canvis NO s\'han desat.';
$string['everyonecanchoose'] = 'Cadascú pot triar subscriure\'s';
$string['everyonecannowchoose'] = 'A partir d\'ara cadascú pot triar subscriure\'s';
$string['everyoneisnowsubscribed'] = 'Ara tothom està subscrit a aquest fòrum';
$string['everyoneissubscribed'] = 'Tothom està subscrit a aquest fòrum';
$string['existingsubscribers'] = 'Subscriptors actuals';
$string['forcessubscribe'] = 'Aquest fòrum subscriu obligatòriament a tothom';
$string['forcesubscribe'] = 'Imposa que tothom estigui subscrit';
$string['forcesubscribeq'] = 'Imposeu que tothom estigui subscrit?';
$string['forum'] = 'Fòrum';
$string['forum:addnews'] = 'Afegir notícies';
$string['forum:createattachment'] = 'Crear adjuncions';
$string['forum:deleteanypost'] = 'Suprimir qualsevol missatge (sempre)';
$string['forum:deleteownpost'] = 'Suprimir missatges propis (dins del termini)';
$string['forum:editanypost'] = 'Editar qualsevol missatge';
$string['forum:initialsubscriptions'] = 'Subscripció inicial';
$string['forum:managesubscriptions'] = 'Gestionar subscripcions';
$string['forum:movediscussions'] = 'Traslladar debats';
$string['forum:rate'] = 'Valorar missatges';
$string['forum:replynews'] = 'Contestar notícies';
$string['forum:replypost'] = 'Contestar missatges';
$string['forum:splitdiscussions'] = 'Partir debats';
$string['forum:startdiscussion'] = 'Començar nous debats';
$string['forum:throttlingapplies'] = 'S\'hi apliquen límits';
$string['forum:viewanyrating'] = 'Veure totes les valoracions';
$string['forum:viewdiscussion'] = 'Veure debats';
$string['forum:viewhiddentimedposts'] = 'Veure missatges programats ocults';
$string['forum:viewqandawithoutposting'] = 'Veure sempre preguntes i respostes';
$string['forum:viewrating'] = 'Veure valoracions';
$string['forum:viewsubscribers'] = 'Veure subscripcions';
$string['forumauthorhidden'] = 'Autor (ocult)';
$string['forumblockingalmosttoomanyposts'] = 'Us esteu apropant al llindar de missatges. Heu enviat $a->numposts missatges en $a->blockperiod i el límit són $a->blockafter missatges.';
$string['forumbodyhidden'] = 'No podeu veure aquest missatge, probablement perquè encara no heu enviat un missatge en aquest debat.';
$string['forumintro'] = 'Introducció al fòrum';
$string['forumname'] = 'Nom del fòrum';
$string['forumposts'] = 'Missatges a fòrums';
$string['forums'] = 'Fòrums';
$string['forumsubjecthidden'] = 'Assumpte (ocult)';
$string['forumtracked'] = 'S\'està fent seguiment de missatges no llegits';
$string['forumtrackednot'] = 'No s\'està fent seguiment de missatges no llegits';
$string['forumtype'] = 'Tipus de fòrum';
$string['generalforum'] = 'Fòrum estàndard per a ús general';
$string['generalforums'] = 'Fòrums generals';
$string['inforum'] = 'en $a';
$string['intronews'] = 'Anuncis i notícies generals';
$string['introsocial'] = 'Un fòrum obert per xerrar sobre qualsevol cosa que es vulgui';
$string['introteacher'] = 'Un fòrum per a notes i debats només del professorat';
$string['invalidrate'] = 'Valoració incorrecta ($a)';
$string['lastpost'] = 'Darrer missatge';
$string['learningforums'] = 'Fòrums d\'aprenentatge';
$string['logblocked'] = 'Registra correus blocats';
$string['longpost'] = 'Missatge llarg';
$string['mailnow'] = 'Envia correu ara';
$string['manydiscussions'] = 'Debats per pàgina';
$string['markalldread'] = 'Marca com a llegits tots els missatges d\'aquest debat.';
$string['markallread'] = 'Marca com a llegits tots els missatges d\'aquest fòrum.';
$string['markread'] = 'Marca com a llegit';
$string['markreadbutton'] = 'Marca<br />llegit';
$string['markunread'] = 'Marca com a no llegit';
$string['markunreadbutton'] = 'Marca<br />no llegit';
$string['maxattachmentsize'] = 'Mida màxima dels fitxers adjunts';
$string['maxtimehaspassed'] = 'Ha passat el temps màxim per editar aquest missatge! ($a)';
$string['message'] = 'Missatge';
$string['missingsearchterms'] = 'Els termes de cerca següents només apareixen en les etiquetes HTML del missatge:';
$string['modeflatnewestfirst'] = 'Visualitza les respostes, començant per la més recent';
$string['modeflatoldestfirst'] = 'Visualitza les respostes, començant per la més antiga';
$string['modenested'] = 'Visualitza les respostes escalonades';
$string['modethreaded'] = 'Visualitza les respostes abreujades, seguint el fil de la discussió';
$string['modulename'] = 'Fòrum';
$string['modulenameplural'] = 'Fòrums';
$string['more'] = 'més';
$string['movedmarker'] = '(traslladat)';
$string['movethisdiscussionto'] = 'Trasllada aquest debat a...';
$string['namenews'] = 'Fòrum de notícies';
$string['namesocial'] = 'Fòrum social';
$string['nameteacher'] = 'Fòrum del professorat';
$string['newforumposts'] = 'Nous missatges dels fòrums';
$string['nodiscussions'] = 'Encara no hi ha cap tema de debat en aquest fòrum';
$string['nodiscussionsstartedby'] = 'No hi ha debats iniciats per aquest usuari';
$string['noguestpost'] = 'Els visitants no poden enviar missatges.';
$string['noguestsubscribe'] = 'Els visitants no poden subscriure\'s per rebre els missatges del fòrum per correu electrònic.';
$string['noguesttracking'] = 'Els visitants no poden definir opcions de seguiment.';
$string['nomorepostscontaining'] = 'No s\'han trobat més missatges que continguin \'$a\'';
$string['nonews'] = 'Encara no s\'han enviat notícies';
$string['nopostforum'] = 'No us és permès d\'escriure en aquest fòrum';
$string['noposts'] = 'No hi ha missatges';
$string['nopostscontaining'] = 'No s\'ha trobat cap missatge que contingui \'$a\'';
$string['noquestions'] = 'Encara no hi ha preguntes en aquest fòrum';
$string['noratinggiven'] = 'Sense valoració';
$string['nosubscribers'] = 'Encara no hi ha subscriptors d\'aquest fòrum';
$string['nothingnew'] = 'Res nou per a $a';
$string['notingroup'] = 'Heu de ser part d\'un grup per veure aquest fòrum.';
$string['notrackforum'] = 'No facis el seguiment de missatges no llegits';
$string['noviewdiscussionspermission'] = 'No teniu permís per a veure debats en aquest fòrum';
$string['nowallsubscribed'] = 'Us heu subscrit a tots els fòrums de $a';
$string['nowallunsubscribed'] = 'Heu cancel·lat la subscripció a tots els fòrums de $a';
$string['nownotsubscribed'] = '$a->name NO rebrà còpies de \'$a->forum\' per correu electrònic.';
$string['nownottracking'] = '$a->name ja no fa el seguiment del fòrum \'$a->forum\'.';
$string['nowsubscribed'] = '$a->name rebrà còpies de \'$a->forum\' per correu electrònic.';
$string['nowtracking'] = '$a->name fa el seguiment del fòrum \'$a->forum\'.';
$string['numposts'] = '$a missatges';
$string['olderdiscussions'] = 'Debats anteriors';
$string['oldertopics'] = 'Temes anteriors';
$string['oldpostdays'] = 'Llegit després de tants dies';
$string['openmode0'] = 'Debats no, respostes no';
$string['openmode1'] = 'Debats no, però respostes sí';
$string['openmode2'] = 'Debats i respostes sí';
$string['overviewnumpostssince'] = '$a missatges des de la darrera entrada';
$string['overviewnumunread'] = '$a no llegits en total';
$string['parent'] = 'Mostra missatge original';
$string['parentofthispost'] = 'Missatge original';
$string['postadded'] = 'S\'ha afegit el vostre missatge. <p>Teniu $a per editar-lo si voleu fer algun canvi.';
$string['postaddedsuccess'] = 'S\'ha afegit correctament el vostre missatge.';
$string['postaddedtimeleft'] = 'Teniu $a per a editar-lo si voleu fer-hi algun canvi.';
$string['postincontext'] = 'Mostra aquest missatge en el seu context';
$string['postmailinfo'] = 'Això és una còpia d\'un missatge enviat al lloc web $a.
Per afegir la vostra resposta via web, feu clic en aquest enllaç:';
$string['postmailnow'] = '<p>Aquest missatge s\'ha enviat per correu immediatament a tots els subscriptors del fòrum.</p>';
$string['postrating1'] = 'Sobretot coneixement separats';
$string['postrating2'] = 'Separats i connectats';
$string['postrating3'] = 'Sobretot coneixements connectats';
$string['posts'] = 'Missatges';
$string['posttoforum'] = 'Envia al fòrum';
$string['postupdated'] = 'S\'ha actualitzat el vostre missatge';
$string['potentialsubscribers'] = 'Subscriptors potencials';
$string['processingdigest'] = 'S\'està processant el resum de correu de l\'usuari $a';
$string['processingpost'] = 'S\'està processant el missatge $a';
$string['prune'] = 'Parteix';
$string['prunedpost'] = 'S\'ha creat un nou debat amb aquest missatge';
$string['pruneheading'] = 'Parteix el debat i mou aquest missatge a un nou debat';
$string['qandaforum'] = 'Fòrum de preguntes i respostes';
$string['qandanotify'] = 'Aquest és un fòrum de preguntes i respostes. A fi de veure les respostes d\'altres a aquestes preguntes, abans heu d\'enviar la vostra resposta.';
$string['rate'] = 'Valora';
$string['rating'] = 'Valoració';
$string['ratingeveryone'] = 'Qualsevol pot valorar els missatges';
$string['ratingno'] = 'Sense valorar';
$string['ratingonlyteachers'] = 'Només els $a poden valorar els missatges';
$string['ratingpublic'] = 'Els $a poden veure les valoracions de tots';
$string['ratingpublicnot'] = 'Els $a només poden veure les seves valoracions';
$string['ratings'] = 'Valoracions';
$string['ratingssaved'] = 'S\'han desat les valoracions';
$string['ratingsuse'] = 'Utilitza valoracions';
$string['ratingtime'] = 'Limita les valoracions als missatges enviats en aquestes dates:';
$string['re'] = 'Re:';
$string['readtherest'] = 'Mostra la resta d\'aquest tema';
$string['replies'] = 'Respostes';
$string['repliesmany'] = '$a respostes fins ara';
$string['repliesone'] = '$a resposta fins ara';
$string['reply'] = 'Contesta';
$string['replyforum'] = 'Contesta al fòrum';
$string['replytouser'] = 'Utilitza l\'adreça de correu en la resposta';
$string['resetforums'] = 'Suprimeix tots els missatges d\'aquests tipus de fòrums';
$string['resetforumsall'] = 'Suprimeix tots els missatges';
$string['resetsubscriptions'] = 'Suprimeix les subscripcions al fòrum';
$string['resettrackprefs'] = 'Suprimeix totes les preferències de seguiment del fòrum';
$string['rsssubscriberssdiscussions'] = 'Visualitza l\'RSS dels debats \'$a\'';
$string['rsssubscriberssposts'] = 'Visualitza l\'RSS dels missatges \'$a\'';
$string['search'] = 'Cerca';
$string['searchdatefrom'] = 'Missatges posteriors a aquesta data';
$string['searchdateto'] = 'Missatges anteriors a aquesta data';
$string['searchforumintro'] = 'Introduïu els termes de la cerca en els camps següents:';
$string['searchforums'] = 'Cerca als fòrums';
$string['searchfullwords'] = 'Aquests mots haurien d\'aparèìxer com a mots complets';
$string['searchnotwords'] = 'Aquests mots NO s\'hi haurien d\'incloure';
$string['searcholderposts'] = 'Cerca missatges anteriors...';
$string['searchphrase'] = 'Aquesta frase exacta ha d\'aparèixer al missatge';
$string['searchresults'] = 'Resultats de la recerca';
$string['searchsubject'] = 'Aquests mots haurien de ser a l\'assumpte';
$string['searchuser'] = 'Aquest nom hauria de coincidir amb l\'autor';
$string['searchuserid'] = 'Moodle ID de l\'autor';
$string['searchwhichforums'] = 'Trieu quins fòrums voleu cercar';
$string['searchwords'] = 'Aquests mots poden aparèixer en qualsevol part del missatge';
$string['seeallposts'] = 'Visualitza tots els missatges d\'aquest usuari';
$string['sendinratings'] = 'Envia les meves darreres valoracions';
$string['shortpost'] = 'Missatge curt';
$string['showsubscribers'] = 'Mostra/edita els subscriptors';
$string['singleforum'] = 'Un debat simple';
$string['startedby'] = 'Iniciat per';
$string['subject'] = 'Assumpte';
$string['subscribe'] = 'Subscriu-me a aquest fòrum';
$string['subscribeall'] = 'Subscriu a tothom a aquest fòrum';
$string['subscribed'] = 'Subscrit';
$string['subscribenone'] = 'Cancel·la totes les subscripcions a aquest fòrum';
$string['subscribers'] = 'Subscriptors';
$string['subscribersto'] = 'Subscriptors de \'$a\'';
$string['subscribestart'] = 'Envia\'m còpia dels missatges d\'aquest fòrum per correu electrònic';
$string['subscribestop'] = 'No vull rebre còpies per correu dels missatges d\'aquest fòrum';
$string['subscription'] = 'Subscripció';
$string['subscriptions'] = 'Subscripcions';
$string['thisforumisthrottled'] = 'Aquest fòrum té limitat el nombre de missatges que podeu enviar-hi en un període de temps determinat. Actualment el límit són $a->blockafter missatges en $a->blockperiod';
$string['timedposts'] = 'Missatges programats';
$string['timestartenderror'] = 'La data de fi de la visualització no pot ser anterior a la data d\'inici';
$string['trackforum'] = 'Fes el seguiments de missatges no llegits';
$string['tracking'] = 'Seguiment';
$string['trackingoff'] = 'Inactiu';
$string['trackingon'] = 'Actiu';
$string['trackingoptional'] = 'Opcional';
$string['trackingtype'] = 'Voleu fer el seguiment de missatges llegits en aquest fòrum?';
$string['unread'] = 'No llegit';
$string['unreadposts'] = 'Missatges no llegits';
$string['unreadpostsnumber'] = '$a missatges no llegits';
$string['unreadpostsone'] = 'Un missatge no llegit';
$string['unsubscribe'] = 'Cancel·la la meva subscripció a aquest fòrum';
$string['unsubscribeall'] = 'Cancel·la la meva subscripció a tots els fòrum';
$string['unsubscribeallconfirm'] = 'Esteu subscrit/a a $a fòrums. Segur que voleu cancel·lar la vostra subscripció a tots els fòrums i inhabilitar la subscripció automàtica?';
$string['unsubscribealldone'] = 'S\'han cancel·lat totes les vostres subscripcions a fòrums, però potser encara rebreu notificacions de fòrums que imposin la subscripció. Si no voleu rebre cap correu d\'aquest servidor, aneu al vostre perfil i inhabiliteu la vostra adreça de correu.';
$string['unsubscribeallempty'] = 'No esteu subscrit a cap fòrum. Si no voleu rebre cap correu d\'aquest servidor, aneu al vostre perfil i inhabiliteu la vostra adreça de correu.';
$string['unsubscribed'] = 'La vostra subscripció ha estat cancel·lada';
$string['unsubscribeshort'] = 'Cancel·la subscripció';
$string['usermarksread'] = 'Marcatge manual de missatges llegits';
$string['warnafter'] = 'Llindar de missatges per a l\'avís';
$string['yesforever'] = 'Sí, per sempre';
$string['yesinitially'] = 'Sí, inicialment';
$string['youratedthis'] = 'La vostra valoració';
$string['yournewquestion'] = 'La vostra pregunta';
$string['yournewtopic'] = 'Nou tema de debat';
$string['yourreply'] = 'La vostra resposta';
$string['cannotaddsubscriber'] = 'No es pot afegir la subscripció de l\'usuari ID $a en aquest fòrum.'; // ORPHANED
$string['cannotfindorcreateforum'] = 'No s\'ha pogut trobar ni crear el fòrum general de notícies del lloc'; // ORPHANED
$string['cannotinsertrate'] = 'No s\'ha pogut inserir una nova valoració ($a[0] = $a[1])'; // ORPHANED
$string['cannotremovesubscriber'] = 'No s\'ha pogut cancel·lar la subscripció de l\'usuari ID $a en aquest fòrum.'; // ORPHANED
$string['cannotupdaterate'] = 'No s\'ha pogut actualitzar una valoració anterior ($a[0] = $a[1])'; // ORPHANED
$string['invalidaccess'] = 'No s\'ha accedit correctament a aquesta pàgina'; // ORPHANED
$string['invalidforumid'] = 'L\'ID del fòrum és incorrecte'; // ORPHANED
$string['invalidpostid'] = 'L\'ID del missatge ($a) no és vàlid'; // ORPHANED
$string['noguestrate'] = 'Els usuaris visitants no poden valorar els missatges'; // ORPHANED
$string['nopermissiontosubscribe'] = 'No teniu permís per a veure les subscripcions del fòrum'; // ORPHANED
$string['norate'] = 'No es permet valorar els missatges'; // ORPHANED
$string['noresult'] = 'No hi ha valoracions d\'aquest missatge: $a'; // ORPHANED
$string['noviewanyrate'] = 'Només podeu veure les valoracions dels vostres missatges'; // ORPHANED
$string['noviewrate'] = 'No teniu permís per a veure les valoracions dels missatges'; // ORPHANED

?>
