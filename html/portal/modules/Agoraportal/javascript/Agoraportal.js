function servicesList(service, stateFilter, search, searchText,order,init,rpp) {
    var pars = "module=Agoraportal&func=servicesList&service=" + service + "&stateFilter=" + stateFilter + "&search=" + search + "&searchText=" + searchText + "&order=" + order + "&init=" + init + "&rpp=" + rpp;
    Element.update('reload', '<img src="images/ajax/circle-ball-dark-antialiased.gif">');
    var myAjax = new Ajax.Request("ajax.php", 
    {
        method: 'get', 
        parameters: pars, 
        onComplete: servicesList_response,
        onFailure: servicesList_failure
    });
}

function requestsList(service, stateFilter, search, searchText,order,init,rpp) {
    var pars = "module=Agoraportal&func=requestsList&service=" + service + "&stateFilter=" + stateFilter + "&search=" + search + "&searchText=" + searchText + "&order=" + order + "&init=" + init + "&rpp=" + rpp;
    Element.update('reload', '<img src="images/ajax/circle-ball-dark-antialiased.gif">');
    var myAjax = new Ajax.Request("ajax.php", 
    {
        method: 'get', 
        parameters: pars, 
        onComplete: requestsList_response,
        onFailure: requestsList_failure
    });
}

function sqlservicesList(search, searchText) {
    if(search == 0) return;
	
    var which = document.getElementById("which").value;
	
    if(which == "selected") {
        var service = document.getElementById("service_sel").value;
        document.getElementById("servicesListContent").className="visible";
        document.getElementById("cerca").className="form_right visible";

        if(document.getElementById("order_sel")){
            order = document.getElementById("order_sel").value;
        }
        else {
            order = 1;
        }
        
        // Service = 0 is a fake service to refer to the portal
        if (service != 0) {
            var pars = "module=Agoraportal&func=sqlservicesList&service=" + service + "&search=" + search + "&searchText=" + searchText + "&order=" + order;
            Element.update('reload', '<img src="images/ajax/circle-ball-dark-antialiased.gif">');
            var myAjax = new Ajax.Request("ajax.php", 
            {
                method: 'get', 
                parameters: pars, 
                onComplete: servicesList_response,
                onFailure: servicesList_failure
            });
        } else {
            document.getElementById("servicesListContent").className="hidden";
            document.getElementById("cerca").className="form_right hidden";
        }
    }
    else{
        document.getElementById("servicesListContent").className="hidden";
        document.getElementById("cerca").className="form_right hidden";
    }
    if(document.getElementById("comandFormDiv"))sqlComandsUpdate(0); //Only with SQL sentences
}

function statsServiceSelected(search, searchText) {
    if(search == 0) return;
    var which = document.getElementById("which").value;
	
    if(which == "selected"){
        var stats_sel = document.getElementById("stats_sel").value;
        var service; // = stats_sel == '4' ? 1 /*Intranet*/ :2 /*Moodle*/;
        switch ($stats_sel) {
            case '1':
            case '2':
            case '3':
                service = 2; // Moodle 1.9
                break;
            case '4':
                service = 1; // Intranet
                break;
            case '5':
            case '6':
            case '7':
                service = 4; // Moodle 2
                break;
        }
		
        document.getElementById("servicesListContent").className = "visible";
        document.getElementById("cerca").className = "form_right visible";
		
        var pars = "module=Agoraportal&func=statsservicesList&service=" + service + "&search=" + search + "&searchText=" + searchText;
        Element.update('reload', '<img src="images/ajax/circle-ball-dark-antialiased.gif">');
        var myAjax = new Ajax.Request("ajax.php", 
        {
            method: 'get', 
            parameters: pars, 
            onComplete: servicesList_response,
            onFailure: servicesList_failure
        });
    }
    else{
        document.getElementById("servicesListContent").className = "hidden";
        document.getElementById("cerca").className = "form_right hidden";
    }
}

function statsGetCSV(which,stat,date_start,date_stop,order){

    var lastorder = document.getElementById("lastorder").value;
    if (lastorder == orderby){
        if (document.getElementById("order").value == "ASC"){
            var order = "DESC";
        }else{
            var order = "ASC";
        }
        document.getElementById("order").value = order;
    }else{
        var order = "ASC";
        document.getElementById("order").value = order;
        document.getElementById("lastorder").value = orderby;
    }

    if(date_start < 20000101 || date_stop < 20000101){
        Element.update('resultsContent', 'Incorrect data');
        return;
    }
    if(date_stop < date_start){
        Element.update('resultsContent', "No results");
        return;
    }
	
    if(which = "selected"){
        var x = document.getElementById("clients_sel");
        var clients = "";
        for (i = 0; i < x.length; i++){
            if(x.options[i].selected == true)
                clients += x.options[i].value + ",";
        }
        clients = clients.substr(0, clients.length-1); //erase the last comma
    }
    
    else var clients = "";
    f=document.forms['statsForm'];
    f.clients.value=clients;

   
    f.action="index.php?module=Agoraportal&type=admin&func=statsGetCSVContent";
   
    f.submit();
    Element.update('resultsContent', '<img src="images/ajax/circle-ball-dark-antialiased.gif">');
/*var myAjax = new Ajax.Request("ajax.php", 
	{
		method: 'get', 
		parameters: pars, 
		onComplete: statsResults_response,
		onFailure: statsResults_failure
	});*/
/*    var pars = "module=Agoraportal&func=statsGetCSV&stats=" + stat + "&which=" + which + "&date_start=" + date_start + "&date_stop=" + date_stop + "&clients=" + clients + "&orderby=" + orderby + " " + order;
	Element.update('resultsContent', '<img src="images/ajax/circle-ball-dark-antialiased.gif">');
	var myAjax = new Ajax.Request("ajax.php", 
	{
		method: 'get', 
		parameters: pars, 
		onComplete: statsResults_response,
		onFailure: statsResults_failure
	});
     */
}
function statsGetStatistics(which, stat, date_start, date_stop, orderby){
    
    var lastorder = document.getElementById("lastorder").value;
    if (lastorder == orderby){
        if (document.getElementById("order").value == "ASC"){
            var order = "ASC";
        }else{
            var order = "ASC";
        }
        document.getElementById("order").value = order;
    }else{
        var order = "ASC";
        document.getElementById("order").value = order;
        document.getElementById("lastorder").value = orderby;
    }

    if(date_start < 20000101 || date_stop < 20000101){
        Element.update('resultsContent', 'Incorrect data');
        return;
    }
    if(date_stop < date_start){
        Element.update('resultsContent', "No results");
        return;
    }
	
    if(which = "selected"){
        var x = document.getElementById("clients_sel");
        var clients = "";
        for (i = 0; i < x.length; i++){
            if(x.options[i].selected == true)
                clients += x.options[i].value + ",";
        }
        clients = clients.substr(0, clients.length-1); //erase the last comma
    }
    else var clients = "";
    var pars = "module=Agoraportal&func=statsGetStatistics&stats=" + stat + "&which=" + which + "&date_start=" + date_start + "&date_stop=" + date_stop + "&clients=" + clients + "&orderby=" + orderby + " " + order;
    Element.update('resultsContent', '<img src="images/ajax/circle-ball-dark-antialiased.gif">');
    var myAjax = new Ajax.Request("ajax.php", 
    {
        method: 'get', 
        parameters: pars, 
        onComplete: statsResults_response,
        onFailure: statsResults_failure
    });
	
	
}

function statsGetStatisticsGraphs(which,which2, stat, date_start, date_stop, orderby,datatype,infotype,date){

    var lastorder = document.getElementById("lastorder").value;
    if (lastorder == orderby){
        if (document.getElementById("order").value == "ASC"){
            var order = "DESC";
        }else{
            var order = "ASC";
        }
        document.getElementById("order").value = order;
    }else{
        var order = "ASC";
        document.getElementById("order").value = order;
        document.getElementById("lastorder").value = orderby;
    }
 
    if(date_start < 20000101 || date_stop < 20000101){
        Element.update('resultsContent', 'Incorrect data');
        return;
    }
    if(date_stop < date_start){
        Element.update('resultsContent', "No results");
        return;
    }

    if(which = "selected"){
        var x = document.getElementById("clients_sel");
        var clients = "";
        for (i = 0; i < x.length; i++){
            if(x.options[i].selected == true)
                clients += x.options[i].value + ",";
        }
        clients = clients.substr(0, clients.length-1); //erase the last comma
    }
    else {
        var clients = "";
    }
    
    var pars = "module=Agoraportal&func=statsGetGraphs&stats=" + stat + "&which=" + which + "&date_start=" + date_start + "&date_stop=" + date_stop +"&datatype="+datatype+"&usuari=" + which2 + "&orderby=" + orderby + " " + order+"&infotype="+infotype+"&date="+date;
    Element.update('resultsContent', '<img src="images/ajax/circle-ball-dark-antialiased.gif">');
    var myAjax = new Ajax.Request("ajax.php", 
    {
        method: 'get', 
        parameters: pars, 
        onComplete: statsResults_response,
        onFailure: statsResults_failure
    });
	
	
}


function statsResults_response(req) {
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);
    Element.update('resultsContent', json.content);
}

function statsResults_failure() {
    Element.update('resultsContent','Error');
}

function statsGenerateStatistics(date){
    if(date < 20000101)
        Element.update('generate', 'Incorrect date');
    var day = date.substr(6,2);
    var month = date.substr(4,2);
    var year = date.substr(0,4);
    var pars = "day="+day+"&month="+month+"&year="+year;
    Element.update('generate', 'Generant...');
    var myAjax = new Ajax.Request("../config/statistics.php", 
    {
        method: 'get', 
        parameters: pars, 
        onComplete: statsGenerateStatistics_response,
        onFailure: statsGenerateStatistics_failure
    });
}
function statsGenerateStatistics_response(req) {
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    Element.update('generate','OK');
}

function statsGenerateStatistics_failure() {
    Element.update('generate','Error');
}

function statsAssistent(key, data) {
    
    if(key == 1){
        // Monthly stats of Moodle selected.
        // Put the first date of the moth in the origin field and the actual date in the end field
        var d = new Date();
      
        var year = d.getFullYear();
        var month = d.getMonth()+1;
        if(month < 10) month='0'+month;
        var date = d.getDate();
        if(date < 10) date='0'+date;
        var today = year.toString()+month.toString()+date.toString();
        var today=date.toString()+"/"+month.toString()+"/"+year.toString();
        var firstday = year.toString()+month.toString()+'01';
        var firstday = '01'+"/"+month.toString()+"/"+year.toString();
        document.getElementById("date_start").value = firstday;
        document.getElementById("date_stop").value = today;

    }else if(key == 2){
        // If first day of the month is selected and monthly mode is in use.
        // Put the last day of the month in th end field
        var date = data.toString();
        var day = date.substr(6, 2);
        var mode = document.getElementById("stats_sel").value;
        //alert(mode);
        if ((day == '01') && (mode == '1')){
            var month = date.substr(4, 2);
            var year = date.substr(0, 4);
            var lastday = (new Date((new Date(parseInt(year,10), parseInt(month,10),1))-1)).getDate();
            // document.getElementById("date_stop").value = year+month+lastday.toString();
            document.getElementById("date_stop").value =lastday.toString()+"/"+month+"/"+year;
        }
    }
}


function sqlExampleUpdate(operation) {
    switch(operation){
        case "SELECT":
            Element.update('sqlexample',"SELECT [columna] FROM [taules] WHERE [condicions]");
            break;
        case "UPDATE":
            Element.update('sqlexample',"UPDATE [taules] SET [columna]=[valor] WHERE [condicions]");
            break;
        case "DELETE":
            Element.update('sqlexample',"DELETE FROM [taula] WHERE [condicions]");
            break;
        case "INSERT":
            Element.update('sqlexample','INSERT INTO [taula] ([columnes]) VALUES ([valors])');
            break;
        case "ALTER":
            Element.update('sqlexample','ALTER TABLE [taula] [ADD | ALTER COLUMN] [columna] [tipus]');
            break;
        default:
            Element.update('sqlexample',"");
    }
}


function servicesList_response(req) {
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);
    Element.update('servicesListContent', json.content);
    Element.update('reload','');
}

function servicesList_failure() {
    Element.update('reload','');
}

function requestsList_response(req) {
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);
    Element.update('requestListContent', json.content);
    Element.update('reload','');
}

function requestsList_failure() {
    Element.update('reload','');
}

function editClientService() {
    var response;
    if (document.forms["editClientServiceForm"].state.value == -3) {
        response = confirm(confirmDischarge);
    } else {
        response = true;
    }
    if(response) {
        document.forms["editClientServiceForm"].submit();
    }

}

function autocompleteClient(value) {
    if(value.length > 3){
        var pars = "module=Agoraportal&func=autocompleteClient&value=" + value;
        showAutoCompete();
        var myAjax = new Ajax.Request("ajax.php", 
        {
            method: 'get', 
            parameters: pars, 
            onComplete: autocompleteClient_response,
            onFailure: autocompleteClient_failure
        });
    } else {
        hideAutoCompete();
    }
}

function autocompleteClient_response(req) {
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);
    Element.update('autocompletediv', json.clients).innerHTML;
}

function autocompleteClient_failure() {

}

function hideAutoCompete() {
    $('autocompletediv').style.visibility = "hidden";
}

function addClient(value) {
    document.forms['register_form'].clientDNS.value = value;
    Element.update('autocompletediv', '').innerHTML;
    $('autocompletediv').style.visibility = "hidden";
}

function showAutoCompete() {
    $('autocompletediv').style.visibility = "visible";
}

function clientsList(search, searchText,init) {
    var pars = "module=Agoraportal&func=clientsList&search=" + search + "&searchText=" + searchText + "&init=" + init;
    Element.update('reload', '<img src="images/ajax/circle-ball-dark-antialiased.gif">');
    var myAjax = new Ajax.Request("ajax.php", 
    {
        method: 'get', 
        parameters: pars, 
        onComplete: clientsList_response,
        onFailure: clientsList_failure
    });
}

function clientsList_response(req) {
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);
    Element.update('clientsListContent', json.content).innerHTML;
    Element.update('reload','');
}

function clientsList_failure() {
    Element.update('reload','');
}

function sendConfig() {
    document.forms.config.submit();
}

function sendUpdateRequest() {
    document.forms.editRequestForm.submit();
}

function createUser() {
    var error = false;
    var f = document.forms.createUser;
    if(f.uname.value==""){
        alert(_AGORAPORTALNOTUSERNAME)
        error = true;
    }
    if(f.password.value=="" && !error) {
        alert(_AGORAPORTALNOTUSERPASSWORD)
        error = true;
    }
    if(f.mail.value=="" && !error) {
        alert(_AGORAPORTALNOTUSERMAIL)
        error = true;
    }
    if (echeck(f.mail.value)==false && !error) {
        alert(_AGORAPORTALNOVALIDEMAIL)
        error = true;
    }
    if(!error){
        f.submit();
    }
}

function editUserRow(userRow, uname, clientCode) {
    var pars = "module=Agoraportal&func=editUserRow&userRow=" + userRow + "&uname=" + uname + "&clientCode=" + clientCode;
    var myAjax = new Ajax.Request("ajax.php", 
    {
        method: 'get', 
        parameters: pars, 
        onComplete: editUserRow_response,
        onFailure: editUserRow_failure
    });
}


function editUserRow_response(req) {
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);
    Element.update('userRow' + json.userRow, json.content);
}

function editUserRow_failure() {
}

function updateUserRow(userRow, uname, clientCode) {
    var f = document.forms.importCreateUsers;
    var pars = "module=Agoraportal&func=updateUserRow&userRow=" + userRow + "&uname=" + uname + "&clientCode=" + clientCode + "&password=" + eval('f.password_' + uname + '.value') + "&name=" + eval('f.name_' + uname + '.value') + "&surname=" + eval('f.surname_' + uname + '.value') + "&surname2=" + eval('f.surname2_' + uname + '.value') + "&mail=" + eval('f.mail_' + uname + '.value');
    var myAjax = new Ajax.Request("ajax.php", 
    {
        method: 'get', 
        parameters: pars, 
        onComplete: updateUserRow_response,
        onFailure: updateUserRow_failure
    });
}

function updateUserRow_response(req) {
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);
    Element.update('userRow' + json.userRow, json.content);
}

function updateUserRow_failure() {
}

function usersList(letter, clientCode,init) {
    var pars = "module=Agoraportal&func=usersList&letter=" + letter + "&clientCode=" + clientCode + "&init=" + init;
    var myAjax = new Ajax.Request("ajax.php", 
    {
        method: 'get', 
        parameters: pars, 
        onComplete: usersList_response,
        onFailure: usersList_failure
    });
}

function usersList_response(req) {
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);
    Element.update('usersListContent', json.content).innerHTML;
}

function usersList_failure() {
}

function deleteUser(uid, clientCode) {
    var response = confirm(confirmUserDeletion);
    if(response){
        var pars = "module=Agoraportal&func=deleteUser&uid=" + uid + "&clientCode=" + clientCode;
        var myAjax = new Ajax.Request("ajax.php", 
        {
            method: 'get', 
            parameters: pars, 
            onComplete: deleteUser_response,
            onFailure: deleteUser_failure
        });
    }
}

function deleteUser_response(req) {
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);
    $('user_' + json.uid).toggle();
}

function deleteUser_failure() {
}

function editService(serviceId) {
    var pars = "module=Agoraportal&func=editService&serviceId=" + serviceId;
    var myAjax = new Ajax.Request("ajax.php", 
    {
        method: 'get', 
        parameters: pars, 
        onComplete: editService_response,
        onFailure: editService_failure
    });
}

function editService_response(req) {
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);
    Element.update('service' + json.serviceId, json.content);
}

function editService_failure() {
}

function updateService(serviceId) {
    var f = document.forms.servicesList;
    var pars = "module=Agoraportal&func=updateService&serviceId=" + serviceId + "&serviceName=" + eval('f.serviceName_' + serviceId + '.value') + "&description=" + eval('f.description_' + serviceId + '.value') + "&version=" + eval('f.version_' + serviceId + '.value') + "&allowedClients=" + eval('f.allowedClients_' + serviceId + '.value') + "&defaultDiskSpace=" + eval('f.defaultDiskSpace_' + serviceId + '.value');
    var myAjax = new Ajax.Request("ajax.php", 
    {
        method: 'get', 
        parameters: pars, 
        onComplete: updateService_response,
        onFailure: updateService_failure
    });
}

function updateService_response(req) {
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);
    Element.update('service' + json.serviceId, json.content);
}

function updateService_failure() {
}

function sitesList(typeId,location,search,searchText,init,rpp) {
    var pars = "module=Agoraportal&func=sitesList&typeId=" + typeId + "&location=" + location + "&search=" + search + "&searchText=" + searchText + "&init=" + init + "&rpp=" + rpp;
    Element.update('reload', '<img src="images/ajax/circle-ball-dark-antialiased.gif">');
    var myAjax = new Ajax.Request("ajax.php", 
    {
        method: 'get', 
        parameters: pars, 
        onComplete: sitesList_response,
        onFailure: sitesList_failure
    });
}

function sitesList_response(req) {
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);
    Element.update('sitesListContent', json.content).innerHTML;
    Element.update('reload','');
}

function sitesList_failure() {
    Element.update('reload','');
}

function sendEditLocation() {
    var f = document.forms['editLocation'];
    var error = false;
    if(f.locationName.value == ''){
        alert(noLocationName);
        error = true;
    }
    if(!error){
        f.submit();
    }
}

function sendEditRequestType() {
    var f = document.forms['editRequestType'];
    var error = false;
    var concat='';
    if(f.requestTypeName.value == '' )   {
        concat=concat+' Nom del tipus de sol·licitud \n'; 
    }
    if(f.requestTypeUserCommentsText.value == ''){
        concat=concat+' Text pel quadre de comentaris \n'; 
                
    }
    if(f.requestTypeDescription.value == ''){
        concat=concat+' Descripció del tipus de sol·licitud \n'; 
             
    }
    if(concat!=''){
        alert('Cal que omplis els següents camps: \n' + concat);
        error=true;
    }
    if(!error){
        f.submit();
    }
}
function sendNewLocation() {
    var f = document.forms['addNewLocation'];
    var error = false;
    if(f.locationName.value == ''){
        alert(noLocationName);
        error = true;
    }
    if(!error){
        f.submit();
    }
}

function sendNewRequestType() {
    var f = document.forms['addNewRequestType'];
    var error = false;
    var concat='';
    if(f.requestTypeName.value == '' )   {
        concat=concat+' Nom del tipus de sol·licitud \n'; 
    }
    if(f.requestTypeUserCommentsText.value == ''){
        concat=concat+' Text pel quadre de comentaris \n'; 
                
    }
    if(f.requestTypeDescription.value == ''){
        concat=concat+' Descripció del tipus de sol·licitud \n'; 
             
    }
    if(concat!=''){
        alert('Cal que omplis els següents camps: \n' + concat);
        error=true;
    }
    if(!error){
        f.submit();
    }
}

function sendNewRequestTypeService() {
    var f = document.forms['addNewRequestTypeService'];
    alert('entra');
    
    f.submit();
    
}
function sendDeleteLocation() {
    var f = document.forms['deleteLocation'];
    f.submit();
}
function sendDeleteRequestType() {
    var f = document.forms['deleteRequestType'];
    f.submit();
}
function sendDeleteRequestTypeService() {
    var f = document.forms['deleteRequestTypeService'];
    f.submit();
}
function sendEditType() {
    var f = document.forms['editType'];
    var error = false;
    if(f.typeName.value == ''){
        alert(noTypeName);
        error = true;
    }
    if(!error){
        f.submit();
    }
}

function sendNewType() {
    var f = document.forms['addNewType'];
    var error = false;
    if(f.typeName.value == ''){
        alert(noTypeName);
        error = true;
    }
    if(!error){
        f.submit();
    }
}

function sendDeleteType() {
    var f = document.forms['deleteType'];
    f.submit();
}

function autoActions(serviceId) {
    var f = document.forms["editClientServiceForm"];
    if (f.state.value == 1 && f.stateOriginal.value != 1) {
        f.sendMail.checked = true;
    } else {
        f.sendMail.checked = false;
    }
    if (f.state.value == -3) {
        f.annotations.value = autoAnnotations;
        f.observations.value = autoObservations;
    }

    if (serviceId == 3) {
        if (f.state.value == 1) {
            f.educatNetwork.checked = true;
        } else {
            f.educatNetwork.checked = false;
        }
    }
}

function autoActionsRequests() {
    document.forms["editRequestForm"].sendMail.checked = true;
}



function modifySettings() {
    var f = document.forms["settings"];
    f.submit();
}

function deleteManager (managerId) {
    $response = confirm(_AGORAPORTALCONFIRMMANAGERDELETION);
    if ($response) {
        var f = document.forms["deleteManager_" + managerId];
        f.submit();
    }
}

function addManager() {
    var f = document.forms["addManager"];
    var error = false;
    if (f.managerUName.value == '') {
        alert(_AGORAPORTALNOTUSERNAME);
        error = true;
    }
    if (f.verifyCode.value == '' && !error) {
        alert(_AGORAPORTALNOTCONFIRMKEY);
        error = true;
    }
    if (!error) {
        f.submit();
    }
}
function addRequest() {
    var f = document.forms["addRequest"];
    var error = false;
    if (!error) {
        f.submit();
    }
}

function logs(init, actionCode, fromDate, toDate, uname, pag) {
    var pars = "module=Agoraportal&func=logs&init=" + init + "&actionCode=" + actionCode + "&pag=" + pag;
    if (uname!=""){
        pars = pars + "&uname=" + uname;
    }
    if (fromDate!=""){
        pars = pars + "&fromDate=" + fromDate;
    }
    if (toDate!=""){
        pars = pars + "&toDate=" + toDate;
    }
	
    Element.update('reload', '<img src="images/ajax/circle-ball-dark-antialiased.gif">');
    var myAjax = new Ajax.Request("ajax.php", 
    {
        method: 'get', 
        parameters: pars, 
        onComplete: logs_response,
        onFailure: logs_failure
    });
}

function logs_response(req) {
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);
    //alert(json.content);
    Element.update('logsContent', json.content).innerHTML;
    Element.update('reload','');
}

function logs_failure(){
    Element.update('reload','');
}

function editUser() {
    var error = false;
    var f = document.forms.editUser;
    if(f.mail.value==""){
        alert(_AGORAPORTALNOTUSERMAIL)
        error = true;
    }
    if (echeck(f.mail.value)==false && !error) {
        alert(_AGORAPORTALNOVALIDEMAIL)
        error = true;
    }
    if(!error){
        f.submit();
    }
}

/**
 * DHTML email validation script. Courtesy of SmartWebby.com (http://www.smartwebby.com/dhtml/)
 */
function echeck(str) {
    var at="@"
    var dot="."
    var lat=str.indexOf(at)
    var lstr=str.length
    var ldot=str.indexOf(dot)
    if (str.indexOf(at)==-1){
        return false
    }

    if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
        return false
    }

    if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
        return false
    }

    if (str.indexOf(at,(lat+1))!=-1){
        return false
    }

    if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
        return false
    }

    if (str.indexOf(dot,(lat+2))==-1){
        return false
    }
		
    if (str.indexOf(" ")!=-1){
        return false
    }

    return true					
}


function sqlComandsUpdate(action, comandId, comandType){
    var serviceId = document.getElementById("service_sel").value;
    var description = document.getElementById("description").value;
    var comand = document.getElementById("sqlfunction").value;
    var comand_type = document.getElementById("comand_type").value;
	
    Element.update('waitCircle', '<img src="images/ajax/circle-ball-dark-antialiased.gif">');

    if (action == 1){
        if ((description == '') || (comand == '')){
            alert('Heu d\'especificar una comanda i una descripció');
            Element.update('waitCircle', '');
            return;
        }
        if (document.getElementById('comandId').value != ''){
            sqlComandsUpdate(3, document.getElementById('comandId').value);
            return;
        }
        var pars = {
            serviceId : serviceId, 
            description : description, 
            comand : comand, 
            comand_type : comand_type, 
            action : 1
        };
    }
    else if (action == 2){
        if (comandId != ''){
            if(confirm("Voleu eliminar la comanda?")) {
                var pars = {
                    serviceId : serviceId, 
                    comandId : comandId, 
                    action : 2
                };
            }
            else{
                sqlComandsUpdate_failure;
            }
        }
        else{
            alert('Heu de seleccionar una comanda');
            Element.update('waitCircle', '');
            return;
        }
    }
    else if (action == 3){
        if (comandId != ''){
            if(confirm("Voleu sobreescriure la comanda ?")) {
                var pars = {
                    serviceId : serviceId, 
                    comandId : comandId, 
                    comand : comand, 
                    description : description, 
                    comand_type : comand_type, 
                    action : 3
                };
            }
            else{
                sqlComandsUpdate_failure;
            }
        }
        else{
            alert('Heu de seleccionar una comanda');
            Element.update('waitCircle', '');
            return;
        }
    }
    else{		
        if (comandType == ''){
            comand_type = 0;
        }
        else{
            comand_type = comandType
        }		
        var pars = {
            serviceId : serviceId, 
            action : 0, 
            comand_type : comand_type
        };
    }
	
    var myAjax = new Ajax.Request("ajax.php?module=Agoraportal&func=sqlComandsUpdate", 
    {
        method: 'post', 
        parameters: pars, 
        onComplete: sqlComandsUpdate_response,
        onFailure: sqlComandsUpdate_failure
    });
	
}

function sqlComandsUpdate_response(req) {
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        Element.update('waitCircle', '');
        return;
    }
    var json = pndejsonize(req.responseText);
    Element.update('comandList', json.content).innerHTML;
    Element.update('msg', json.msg).innerHTML;
	
    if ((json.action == 1) || (json.action == 2))document.getElementById('sqlfunction').value = '';
    var selected_tab = document.getElementById('selected_tab').value;
    document.getElementById('tab_'+selected_tab).className='';
    document.getElementById('tab_'+json.comand_type).className='tab_select';
    document.getElementById('selected_tab').value=json.comand_type;
    document.getElementById('comandId').value='';
    document.getElementById('description').value = '';
    document.getElementById('comand_type').value= '0';
    document.getElementById('comandFormDiv').className='hidden';
    Element.update('waitCircle', '');
}

function sqlComandsUpdate_failure() {
    document.getElementById('comandId').value='';
    Element.update('waitCircle', '');
}

function sqlFunctionUpdate(action, comandId) {
    Element.update('waitCircle', '<img src="images/ajax/circle-ball-dark-antialiased.gif">');
    var myAjax = new Ajax.Request("ajax.php?module=Agoraportal&func=sqlFunctionUpdate", 
    {
        method: 'post', 
        parameters: {
            comandId : comandId, 
            action : action
        }, 
        onComplete: sqlFunctionUpdate_response,
        onFailure: sqlFunctionUpdate_failure
    });	
}

function sqlFunctionUpdate_response(req) {
    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    var json = pndejsonize(req.responseText);
    document.getElementById('sqlfunction').value =  json.comand;
	
    if (json.action == '2'){
        document.getElementById('comandFormDiv').className='visible';
        document.getElementById('description').value= json.description;		
        document.getElementById('comandId').value= json.comandId;
        document.getElementById('comand_type').value= json.comand_type;
    }
    Element.update('waitCircle', '');
    Element.update('msg', '');
}

function sqlFunctionUpdate_failure() {
    Element.update('waitCircle', '');
}

function sqlSearch() {
    var sql_function = document.getElementById('sqlfunction').value;
    var select_found = sql_function.search(/select/i);
    var insert_found = sql_function.search(/insert/i);
    var update_found = sql_function.search(/update/i);
    var delete_found = sql_function.search(/delete/i);
    var alter_found = sql_function.search(/alter/i);
	
    if(select_found != -1) document.getElementById('comand_type').value= 1;
    if(insert_found != -1) document.getElementById('comand_type').value= 2;
    if(update_found != -1) document.getElementById('comand_type').value= 3;
    if(delete_found != -1) document.getElementById('comand_type').value= 4;
    if(alter_found != -1) document.getElementById('comand_type').value= 5;

}

function refuseAns(answer) {
    var confirmation;
    var f;
    f = document.forms['acceptrefuseform'];
    f.answer.value = answer;
    if (answer == 0) {
        confirmation = confirm("Confirma que rebutges l'encàrrec.");
        if (confirmation) {
            f.submit();
        }
    } else {
        f.submit();
    }
}

function askServiceCheckActive(serviceName) {
    var f=document.forms['askForService'];
    if (serviceName == 'moodle') {
        if (document.getElementById('moodle').checked) {
            document.getElementById('marsupial').disabled = false;
        }
        if (!document.getElementById('moodle').checked) {
            document.getElementById('marsupial').disabled = true;
            document.getElementById('marsupial').checked = false;
        }
    }
}


function showServices(requestTypeId) {

    // Id = 0 means user has selected the "choose one" text
    if (requestTypeId == 0) {
        Element.update('menuservices', '');
        Element.update('usermessage', '');
        return ;
    }
    
    var pars = "module=Agoraportal&func=getRequestServices&requestTypeId="+requestTypeId;
 
    Element.update('menuservices', '<img src="images/ajax/circle-ball-dark-antialiased.gif">');
    Element.update('usermessage', '');
    
    var myAjax = new Ajax.Request("ajax.php", 
    {
        method: 'get', 
        parameters: pars, 
        onComplete: showServices_response,
        onFailure: showServices_failure
    });
}

function showServices_response(req) {

    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    
    var json = pndejsonize(req.responseText);

    Element.update('menuservices', json.content);
}


function showServices_failure() {
}



function showRequestMessage(serviceId, requestTypeId, clientCode) {

    // Id = 0 means user has selected the "choose one" text
    if (serviceId == 0) {
        Element.update('usermessage', '');
        return ;
    }
    
    var pars = "module=Agoraportal&func=getRequestMessage&serviceId="+serviceId+"&requestTypeId="+requestTypeId+"&clientCode="+clientCode;

    Element.update('usermessage', '<img src="images/ajax/circle-ball-dark-antialiased.gif">');
    
    var myAjax = new Ajax.Request("ajax.php", 
    {
        method: 'get', 
        parameters: pars, 
        onComplete: showRequestMessage_response,
        onFailure: showRequestMessage_failure
    });
}

function showRequestMessage_response(req) {

    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    
    var json = pndejsonize(req.responseText);

    Element.update('usermessage', json.content);
}


function showRequestMessage_failure() {
}

function display(target){
    $('uploadFiles').style.display='none';
    $('m19').style.display='none';
    $('m2x').style.display='none';
    $(target).style.display='block';
}

function deleteFileM2x(filename,clientCode){
    if(!confirm("Confirmeu que voleu esborrar el fitxer '" + filename + "'.")) {
        return;
    }
    var pars = "module=Agoraportal&func=deleteFileM2x&filename=" + filename + "&clientCode=" + clientCode;
    var myAjax = new Ajax.Request("ajax.php", 
    {
        method: 'get', 
        parameters: pars, 
        onComplete: deleteFileM2x_response,
        onFailure: deleteFileM2x_failure
    });
    
}

function deleteFileM2x_response(req) {

    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    
    var json = pndejsonize(req.responseText);

    $('file_' + json.filename).toggle();
}

function deleteFileM2x_failure() {
}

function deleteFileM19(filename,courseId,clientCode){
    if(!confirm("Confirmeu que voleu esborrar el fitxer '" + filename + "'.")) {
        return;
    }
    var pars = "module=Agoraportal&func=deleteFileM19&filename=" + filename + "&courseId=" + courseId + "&clientCode=" + clientCode;
    var myAjax = new Ajax.Request("ajax.php", 
    {
        method: 'get', 
        parameters: pars, 
        onComplete: deleteFileM19_response,
        onFailure: deleteFileM19_failure
    });
    
}

function deleteFileM19_response(req) {

    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    
    var json = pndejsonize(req.responseText);

    //Element.update('filemoved_' + json.filename + '_courseId_' + json.courseId, 'Moved');
    $('fileRow_' + json.filename + '_courseId_' + json.courseId).toggle();
}

function deleteFileM19_failure() {
}

function moveFileToM2x(filename,courseId,clientCode){
    if(!confirm("Confirmeu que voleu moure el fitxer '" + filename + "' des de Moodle 1.9 a Moodle 2.x.")) {
        return;
    }
    var pars = "module=Agoraportal&func=moveFileToM2x&filename=" + filename + "&courseId=" + courseId + "&clientCode=" + clientCode;
    var myAjax = new Ajax.Request("ajax.php", 
    {
        method: 'get', 
        parameters: pars, 
        onComplete: moveFileToM2x_response,
        onFailure: moveFileToM2x_failure
    });
    
}

function moveFileToM2x_response(req) {

    if (req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }
    
    var json = pndejsonize(req.responseText);

    Element.update('filemoved_' + json.filename + '_courseId_' + json.courseId, json.result);
}

function moveFileToM2x_failure() {
}

//moveFileToM2x