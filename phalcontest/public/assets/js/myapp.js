var validateData =  function(type,ID,giatri,name,thang,nam){
    name = name.toUpperCase();
    if(type=='disease'){
        if(name != 'SM' && name != 'SM1' && name != 'SM2' ){
            $("#name_ip_"+ID).addClass('perror');
            return false;
        }
    }
    if(type=='equipment'){
        if(name != 'BI' && name != 'BI1' && name != 'BI2' ){
            $("#name_ip_"+ID).addClass('perror');
            return false;
        }
    }
    if(type=='equipmentvalue'){
        if(name != 'CI' && name != 'CI1' && name != 'CI2' ){
            $("#name_ip_"+ID).addClass('perror');
            return false;
        }
    }
    if(type=='lavamosquitohouse'){
        if(name != 'HIL' && name != 'HIL1' && name != 'HIL2' ){
            $("#name_ip_"+ID).addClass('perror');
            return false;
        }
    }
    if(type=='mosquitodensity'){
        if(name != 'DI' && name != 'DI1' && name != 'DI2' ){
            $("#name_ip_"+ID).addClass('perror');
            return false;
        }
    }
    if(type=='mosquitohouse'){
        if(name != 'HIM' && name != 'HIM1' && name != 'HIM2' ){
            $("#name_ip_"+ID).addClass('perror');
            return false;
        }
    }
    if(type=='weather'){
        if(name != 'AD' && name != 'AD1' && name != 'AD2' ){
            $("#name_ip_"+ID).addClass('perror');
            return false;
        }
    }
    if(thang > 12 || thang < 1){
        $("#thang_ip_"+ID).addClass('perror');
        return false;
    }
    var currentTime = new Date()
    var year = currentTime.getFullYear()
    if(nam < 0 || nam > (year+5)){
        $("#nam_ip_"+ID).addClass('perror');
        return false;
    }
    return true;
}