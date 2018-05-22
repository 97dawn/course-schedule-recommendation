function result(){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function (){
        if(xhr.readyState === 4 && xhr.status === 200){
            var json = JSON.parse(xhr.responseText);
            var timetables = document.getElementsByClassName("timetables")[0];
            timetables.innerHTML="";
            if(json['schedule'] == -1){
                timetables.innerHTML = "<p style=\"font-size:20px;\"> There is nothing to take.</p>";
            }
            else{
                for(var num in json['schedule']){
                    var div = "<div class = \"timetable"+num+"\" style=\"display: block;border: thick dotted white; padding-left:10px;padding-right:5px;margin:10px;display:inline-block;\"><br>";
                    var head = "<p style=\"font-size:20px; text-decoration: underline; font-weight:bold;\"> Schedule "+(num)+"</p>";
                    div+=head;
                    var i=0;
                    for(var course in json['schedule'][num]){
                        var courseName = json.schedule[num][course].cname;
                        var lecDays = json.schedule[num][course].lec_days;
                        var recDays = json.schedule[num][course].rec_days;
                        var lecStartH = json.schedule[num][course].lec_start[0];
                        var lecStartM = json.schedule[num][course].lec_start[1];
                        var lecEndH = json.schedule[num][course].lec_end[0];
                        var lecEndM = json.schedule[num][course].lec_end[1];
    
                        for(var j=0 ; j<lecDays.length ; j+=2){
                            var text="<p style=\"margin:0px; padding:0px;display:inline;\">";
                            if(lecDays.charAt(j)+lecDays.charAt(j+1) == "MO"){
                                text += courseName + " Mon " + lecStartH + ":";
                            }
                            else if(lecDays.charAt(j)+lecDays.charAt(j+1) == "TU"){
                                text += courseName + " Tue " + lecStartH + ":";
                            }
                            else if(lecDays.charAt(j)+lecDays.charAt(j+1) == "WE"){
                                text += courseName + " Wed " + lecStartH + ":";
                            }
                            else if(lecDays.charAt(j)+lecDays.charAt(j+1) == "TH"){
                                text += courseName + " Thur " + lecStartH + ":"
                            }
                            else if(lecDays.charAt(j)+lecDays.charAt(j+1) == "FR"){
                                text += courseName + " Fri " + lecStartH + ":" ;
                            }
                            if(lecStartM == 0){
                                text += lecStartM + "0 - " + lecEndH + ":";
                            }
                            else{
                                text += lecStartM + " - " + lecEndH + ":";
                            }
                            if(lecEndM == 0){
                                text += lecEndM + "0";
                            }
                            else{
                                text += lecEndM;
                            }
                            text+="</p><br>";
                            div += text;
                        }
    
                        if(recDays != null){
                            var recStartH = json.schedule[num][course].rec_start[0];
                            var recStartM = json.schedule[num][course].rec_start[1];
                            var recEndH = json.schedule[num][course].rec_end[0];
                            var recEndM = json.schedule[num][course].rec_end[1];
                            for(var k=0 ; k<recDays.length ; k+=2){
                                var text="<p style=\"margin:0px; padding:0px;display:inline;\">";
                                var day = recDays.charAt(k)+recDays.charAt(k+1);
                                switch(day){
                                    case "MO":
                                        text += courseName + "REC Mon " + recStartH + ":";
                                        break;
                                    case "TU":
                                        text += courseName + "REC Tue " + recStartH + ":";
                                        break;
                                    case "WE":
                                        text += courseName + "REC Wed " + recStartH + ":";
                                        break;
                                    case "TH":
                                        text += courseName + "REC Thur " + recStartH + ":";
                                        break;
                                    case "FR":
                                        text += courseName + "REC Fri " + recStartH + ":";
                                        break;
                                }
                                if(recStartM == 0){
                                    text += recStartM + "0 - " + recEndH + ":";
                                }
                                else{
                                    text += recStartM + " - " + recEndH + ":";
                                }
                                if(recEndM == 0){
                                    text += recEndM + "0";
                                }
                                else{
                                    text += recEndM;
                                }
                                text+="</p><br>";
                                div += text;
                            }
                        }
                        div+="<br>";
                        i++;
                    }
                    div+="</div><br>";
                    timetables.innerHTML += div;
                }
                // Change some css
                
                var siteWrapper = document.getElementsByClassName("site-wrapper")[0];
                if(siteWrapper.clientHeight >screen.height){
                    var html = document.getElementsByTagName("html")[0];
                    var body = document.getElementsByTagName("body")[0];
                    var mastFoot = document.getElementsByClassName("mastfoot")[0];
                    html.style.height = "auto";
                    body.style.height = "auto";
                    siteWrapper.style.height = "auto";
                    siteWrapper.style.minHeight = "auto";
                    mastFoot.style.position = "relative";
                }
            }
        }            
    };    
    
    xhr.open("POST", "../application/schedule.php", true);
    xhr.setRequestHeader("Content-type", "application/json");
    xhr.send(null);
}