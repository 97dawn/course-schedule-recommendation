function result(){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function (){
        if(xhr.readyState === 4 && xhr.status === 200){
            var json = JSON.parse(xhr.responseText);
            var dejson = "";
            var timetables = document.getElementById("timetable");
            timetables.innerHTML = "";
            
            for(var schedule in json['data']){
                var timetable = new Timetable();
                timetable.setScope(9, 17);
                timetable.addLocations(['Mon', 'Tue', 'Wed', 'Thur', 'Fri']); // for my table, locations are days
            
                var courseName = json['data'][schedule]['cname'];
                var lecDays = json['data'][schedule]['lec_days'];
                var recDay = json['data'][schedule]['rec_days'];
                var lecStartH = json['data'][schedule]['lec_start'][0];
                var lecStartM = json['data'][schedule]['lec_start'][1];
                var lecEndH = json['data'][schedule]['lec_end'][0];
                var lecEndM = json['data'][schedule]['lec_end'][1];

                var lecStartDate = new Date(2018,1,1,lecStartH, lecStartM);
                var lecEndDate = new Date(2018,1,1,lecEndH, lecEndM);
                for(var i=0 ; i<lecDays.length ; i+=2){
                    if(lecDays.charAt(i)+lecDays.charAt(i+1) == "MO"){
                        timetable.addEvent(courseName, 'Mon', lecStartDate, lecEndDate, null);
                    }
                    else if(lecDays.charAt(i)+lecDays.charAt(i+1) == "TU"){
                        timetable.addEvent(courseName, 'Tue', lecStartDate, lecEndDate, null);
                    }
                    else if(lecDays.charAt(i)+lecDays.charAt(i+1) == "WE"){
                        timetable.addEvent(courseName, 'Wed', lecStartDate, lecEndDate, null);
                    }
                    else if(lecDays.charAt(i)+lecDays.charAt(i+1) == "TH"){
                        timetable.addEvent(courseName, 'Thur', lecStartDate, lecEndDate, null);
                    }
                    else if(lecDays.charAt(i)+lecDays.charAt(i+1) == "FR"){
                        timetable.addEvent(courseName, 'Fri', lecStartDate, lecEndDate, null);
                    }
                }

                if(recDay != null){
                    var recStartH = json['data'][schedule]['rec_start'][0];
                    var recStartM = json['data'][schedule]['rec_start'][1];
                    var recEndH = json['data'][schedule]['rec_end'][0];
                    var recEndM = json['data'][schedule]['rec_end'][1];
                    var recStartDate = new Date(2018,1,1,recStartH, recStartM);
                    var recEndDate = new Date(2018,1,1,recEndH, recEndM);
                    for(var i=0 ; i<recDays.length ; i+=2){
                        if(recDays.charAt(i)+recDays.charAt(i+1) == "MO"){
                            timetable.addEvent(courseName+" REC", 'Mon', recStartDate, recEndDate, null);
                        }
                        else if(recDays.charAt(i)+recDays.charAt(i+1) == "TU"){
                            timetable.addEvent(courseName+" REC", 'Tue', recStartDate, recEndDate, null);
                        }
                        else if(recDays.charAt(i)+recDays.charAt(i+1) == "WE"){
                            timetable.addEvent(courseName+" REC", 'Wed', recStartDate, recEndDate, null);
                        }
                        else if(recDays.charAt(i)+recDays.charAt(i+1) == "TH"){
                            timetable.addEvent(courseName+" REC", 'Thur', recStartDate, recEndDate, null);
                        }
                        else if(recDays.charAt(i)+recDays.charAt(i+1) == "FR"){
                            timetable.addEvent(courseName+" REC", 'Fri', recStartDate, recEndDate, null);
                        }
                    }
                }
                
                var renderer = new Timetable.Renderer(timetable);
                renderer.draw('.timetable'); // any css selector
                
            }
        }
    }    
    
    xhr.open("POST", "../application/schedule.php", true);
    xhr.setRequestHeader("Content-type", "application/json");
    xhr.send();
}