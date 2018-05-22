function result(){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function (){
        if(xhr.readyState === 4 && xhr.status === 200){
            var json = JSON.parse(xhr.responseText);
            console.log("json: "+json);
            var dejson = "";
            var timetables = document.getElementById("timetables");
            timetables.innerHTML = "";
            
            for(var schedule in json['data']){
                var i=0;
                var timetable = new Timetable();
                timetable.setScope(9, 17);
                // for my table, locations are days. Mon:2018.8.27, Tue:2018.8.28, Wed:2018.8.29, Thur:2018.8.30, Fri:2018.8.31
                timetable.addLocations(['Mon', 'Tue', 'Wed', 'Thur', 'Fri']); 
                for(var course in json['data'][schedule]){
                    
                    var courseName = json.data.schedule[i].cname;
                    var lecDays = json.data.schedule[i].lec_days;
                    var recDays = json.data.schedule[i].rec_days;
                    var lecStartH = json.data.schedule[i].lec_start[0];
                    var lecStartM = json.data.schedule[i].lec_start[1];
                    var lecEndH = json.data.schedule[i].lec_end[0];
                    var lecEndM = json.data.schedule[i].lec_end[1];

                    for(var j=0 ; j<lecDays.length ; j+=2){
                        if(lecDays.charAt(j)+lecDays.charAt(j+1) == "MO"){
                            timetable.addEvent(courseName, 'Mon', new Date(2018,8,27,lecStartH, lecStartM), new Date(2018,8,27,lecEndH, lecEndM), null);
                        }
                        else if(lecDays.charAt(j)+lecDays.charAt(j+1) == "TU"){
                            timetable.addEvent(courseName, 'Tue', new Date(2018,8,28,lecStartH, lecStartM), new Date(2018,8,28,lecEndH, lecEndM), null);
                        }
                        else if(lecDays.charAt(j)+lecDays.charAt(j+1) == "WE"){
                            timetable.addEvent(courseName, 'Wed', new Date(2018,8,29,lecStartH, lecStartM), new Date(2018,8,29,lecEndH, lecEndM), null);
                        }
                        else if(lecDays.charAt(j)+lecDays.charAt(j+1) == "TH"){
                            timetable.addEvent(courseName, 'Thur', new Date(2018,8,30,lecStartH, lecStartM), new Date(2018,8,30,lecEndH, lecEndM), null);
                        }
                        else if(lecDays.charAt(j)+lecDays.charAt(j+1) == "FR"){
                            timetable.addEvent(courseName, 'Fri', new Date(2018,8,31,lecStartH, lecStartM), new Date(2018,8,31,lecEndH, lecEndM), null);
                        }
                    }

                    // if(recDays != null){
                    //     var recStartH = json.data.schedule[i].rec_start[0];
                    //     var recStartM = json.data.schedule[i].rec_start[1];
                    //     var recEndH = json.data.schedule[i].rec_end[0];
                    //     var recEndM = json.data.schedule[i].rec_end[1];
                    //     for(var k=0 ; k<recDays.length ; k+=2){
                    //         console.log(recDays);
                    //         console.log(recDays.charAt(0));
                    //         console.log(recDays.charAt(k+1));
                    //         var day = recDays.charAt(k)+recDays.charAt(k+1);
                    //         switch(day){
                    //             case "MO":
                    //                 timetable.addEvent(courseName, 'Mon', new Date(2018,8,27,recStartH, recStartM), new Date(2018,8,27,recEndH, recEndM), null);
                    //                 break;
                    //             case "TU":
                    //                 timetable.addEvent(courseName, 'Tue', new Date(2018,8,28,recStartH, recStartM), new Date(2018,8,28,recEndH, recEndM), null);
                    //                 break;
                    //             case "WE":
                    //                 timetable.addEvent(courseName, 'Wed', new Date(2018,8,29,recStartH, recStartM), new Date(2018,8,29,recEndH, recEndM), null);
                    //                 break;
                    //             case "TH":
                    //                 timetable.addEvent(courseName, 'Thur', new Date(2018,8,30,recStartH, recStartM), new Date(2018,8,30,recEndH, recEndM), null);
                    //                 break;
                    //             case "FR":
                    //                 timetable.addEvent(courseName, 'Fri', new Date(2018,8,31,recStartH, recStartM), new Date(2018,8,31,recEndH, recEndM), null);
                    //                 break;
                    //         }
                    //     }
                    // }
                    i++;
                }
            
                var div = "<div id=timetable"+i+"></div>";
                timetables.innerHTML = div;
                var renderer = new Timetable.Renderer(timetable);
                renderer.draw('#timetable');
                
            }
        }
    }    
    
    xhr.open("POST", "../application/schedule.php", true);
    xhr.setRequestHeader("Content-type", "application/json");
    xhr.send();
}