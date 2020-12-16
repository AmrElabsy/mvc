$(document).ready(function () {
    "use strict";

    // If the page height is smaller than the window height,
    // this statement makes the footer rendered at the end of the window 
    var myFooter = $('#footer'),
        docHeight = $(window).height(),
        footerHeight = myFooter.height(),
        footerTop = myFooter.position().top + footerHeight,
        myInput = $('#signUp_form input'),
        signUpDoctor = $('.btn-doctor'),
        signUpPatient = $('.btn-patient');

    if (footerTop < docHeight) {
        myFooter.css('margin-top', 10 + (docHeight - footerTop) + 'px');
    }

    // @TODO: This statement is used to change the dafault behaviour of the anchor
    // This **MUST** be removed when the project is Deployed on a server
    $("a").click(function(event) {
        event.preventDefault();
        var href =  "mvc/" + $(this).attr("href");
        window.location =href;
    });

    $("form").action = "mvc/" + $("form").action;
    // $("form").submit(function(event) {
    //     event.preventDefault();
    //     var action =  "mvc/" + $(this).attr("action");
    //     $(this).action = action;
    //     console.log( $(this) );
    //     $(this).submit();
    // });

    myInput.focus(function () {
        $(this).css({
            "border": "none",
            "borderBottom": "2px solid #3182F9"
        });

        $(this).prev().css({
            color: '#3182F9',
            fontFamily: 'arial'
        });

        $(this).prev().animate({
            bottom: '-7px',
            fontSize: '12px'
        }, 500);
    });

    myInput.blur(function () {
        $(this).css({
            "border": "none",
            "borderBottom": "2px solid #bcbaba"
        });
        $(this).prev().fadeIn(function () {
            $(this).css({
                color: '#CECECE',
                fontFamily: 'Bodoni MT',
                fontSize: '17px',
                position: 'relative',
                bottom: '-35px'
            });
        });
    });

     
        
    signUpPatient.click(function () {
        $(this).addClass('btn-primary').siblings().removeClass('btn-primary');
        $(this).removeClass('btn-outline-primary').siblings().addClass('btn-outline-primary');
        $(".form-patient").fadeIn(0);
        $(".form-doctor").fadeOut(0);
    });

    signUpDoctor.click(function () {
        $(this).addClass('btn-primary').siblings().removeClass('btn-primary');
        $(this).removeClass('btn-outline-primary').siblings().addClass('btn-outline-primary');
        $(".form-doctor").fadeIn(0);
        $(".form-patient").fadeOut(0);
    });


    myInput.blur(function () {
        if ($(this).val() !== "") {
            $(this).prev().css({
                color: '#CECECE',
                fontFamily: 'arial',
                bottom: '-7px',
                fontSize: '12px'
            });
        }
    });
    $("#datepicker").on('change', function () {
        if ($(this).val() !== "") {
            $(this).prev().css({
                color: '#CECECE',
                fontFamily: 'arial',
                bottom: '-7px',
                fontSize: '12px'
            });
        }
    });

    $('signUp_form select').on('change', function () {
        if ($(this).val() !== 0) {
            $(this).css({
                color: '#000'
            });
        }
    });

    $("#timepicker").on('change', function () {

    });

    function animateValue(id, start, end) {
        var range = end - start,
            current = start,
            increment = end > start ? 1 : -1,
            obj = document.getElementById(id),
            time = 4000 / end,
            timer = setInterval(function () {
                current += increment;
                //obj.innerHTML = current;
                if (current === end) {
                    clearInterval(timer);
                }
            }, time);

    }


    animateValue("num", 0, $('#num').text());
    animateValue("num2", 0, $('#num2').text());
    animateValue("num3", 0, $('#num3').text());


    $(function () {
        $("#datepicker").datepicker();
    });
    $("select").change(function () {
        $(this).css('color', '#222');
    });

    $('.sign-in input').focus(function () {
        $(this).next().css('color', '#387FF5');
    });

    $('.sign-in input').focusout(function () {
        $(this).next().css('color', '#999');
    });

    if (document.getElementById('chartContainer') !== null) {

        let stats;
        $.getJSON('public/json/file.json', function (data) {

            (function () {
                if (window.localStorage) {
                    if (!localStorage.getItem('firstLoad')) {
                        localStorage['firstLoad'] = true;
                        window.location.reload();
                    } else
                        localStorage.removeItem('firstLoad');
                }
            })();

            stats = data;
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                toolTip: {
                    shared: true
                },
                legend: {
                    cursor: "pointer",
                    itemclick: toggleDataSeries,
                    fontSize: 15,
                    verticalAlign: 'top',
                    fontColor: '#A29E9E',
                    fontWeight: 'normal',
                },

                axisY: {
                    labelFontSize: 15,
                },
                axisX: {
                    labelFontSize: 15,
                },
                dataPointWidth: 20,
                data: [{
                    type: "column",
                    name: "Old",
                    legendText: "Old",
                    color: '#1AC7DA',
                    showInLegend: true,
                    dataPoints: [
                        {label: stats[0]['date'], y: stats[0]['old']},
                        {label: stats[1]['date'], y: stats[1]['old']},
                        {label: stats[2]['date'], y: stats[2]['old']},
                        {label: stats[3]['date'], y: stats[3]['old']},
                        {label: stats[4]['date'], y: stats[4]['old']},
                        {label: stats[5]['date'], y: stats[5]['old']}
                    ]
                },
                    {
                        type: "column",
                        name: "New",
                        legendText: "New",
                        color: '#FFE374',
                        showInLegend: true,
                        dataPoints: [
                            {label: stats[0]['date'], y: stats[0]['new']},
                            {label: stats[1]['date'], y: stats[1]['new']},
                            {label: stats[2]['date'], y: stats[2]['new']},
                            {label: stats[3]['date'], y: stats[3]['new']},
                            {label: stats[4]['date'], y: stats[4]['new']},
                            {label: stats[5]['date'], y: stats[5]['new']}
                        ]
                    }]
            });

            chart.render();
        });
    }
    function toggleDataSeries(e) {
        if(typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        }
        else {
            e.dataSeries.visible = true;
        }
        chart.render();
    };
    
    function createPassbook()
    {
        $('body').append('<div id="printDiv"></div>');
        $('#printDiv').append('<h1><span>'+$('#No').text()+'</span></h1>');
        $('#printDiv').append('<label>Name : <label>');
        $('#printDiv').append('<span>'+$('#pName').text()+'</span><br>');
        $('#printDiv').append('<label>Clinic : <label>');
        $('#printDiv').append('<span>Dentist</span><br>');
        $('#printDiv').prevAll().remove();
      
        
    }
    function print()
    {
        window.print(); 
    }

    document.querySelector("#printPassbook").addEventListener("click", function() {
        createPassbook();
        print();
    
    });
    
    function add(){
        var arr = []; 
        $('input').each(function() {
            var myClass = $(this).attr('class'),
                find = myClass.search("medicineName-","i");
            if (find == 0) {
                arr.push($(this));
            }
        });
        var count = arr.length;
        
        var arr1 = []; 
        $('input').each(function() {
            var myClass1 = $(this).attr('class'),
                find1 = myClass1.search("medicineTimes-","i");
            if (find1 == 0) {
                arr1.push($(this));
            }
        });
        
        $('.addMed').before('<input class="medicineName-'+count+'" type="text" placeholder="Type Medicine Name">');
        $('.addMed').before('<input class="medicineTimes-'+count+'" type="text" placeholder="Type Medicine Name">')
    };
    
    $('.addMed').on('click',function(){
        add(); 
    });
    
    function savePrescription(){
        var arr = []; 
        $('input').each(function() {
            var myClass = $(this).attr('class'),
                find = myClass.search("medicineName-","i");
            if (find == 0) {
                arr.push($(this));
            }
        });
        var arr1 = []; 
        $('input').each(function() {
            var myClass1 = $(this).attr('class'),
                find1 = myClass1.search("medicineTimes-","i");
            if (find1 == 0) {
                arr1.push($(this));
            }
        });
        var count = arr.length;
        var i;
        $('body').append('<div class="printPrescription"></div>');
        $('.printPrescription').append('<div class="nav"></div>');
        $('.nav').append('<label class="name">Kafrelsheikh University Hospital<br><span>Clinics Department</span><br><span>Name: Salma Ahmed Mahmoud</span></label>');
        $('.nav').append('<label class="docName">Dr/Ahmed Mahmoud<br><span>Dentist Clinic<br>Date: 5/12/2020</span></label>');
        $('.printPrescription').append('<div class="prescriptionBody"></div>');
        $('.prescriptionBody').append('<ol></ol>');
        for (i = 0; i < count; i = i + 1)
            if(arr[i].val() != "" && arr[i].val() != " ")
            {
                $('.printPrescription ol').append('<li>'+arr[i].val()+" "+" "+'('+arr1[i].val()+')'+'</li>');
            }
        $('body').children().hide();
        $('.printPrescription').show();
         };
    $('a.save').on('click', function(){
        savePrescription();
        print();
    });

});
