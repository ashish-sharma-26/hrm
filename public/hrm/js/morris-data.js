$(function() {

    Morris.Area({
        element: 'morris-area-chart',
        data: [{
            date: '2 FEB',
            leads: 110,
     
        }, {
            date: '3 FEB',
            leads: 190,
          
        }, {
            date: '4 FEB',
            leads: 150,
       
        }, {
            date: '5 FEB',
            leads: 210,
          
        }, {
            date: '6 FEB',
            leads: 175,
      
        }, {
            date: '7 FEB',
            leads: 240,

        }, {
            date: '8 FEB',
            leads: 225,
         
        }, {
            date: '9 FEB',
            leads: 300,
 
        }],
        xkey: 'date',
        ykeys: ['leads'],
        labels: ['Leads'],
        pointSize: 3,
        hideHover: 'auto',
        resize: true
    });

    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "Initiated",
            value: 30
        }, {
            label: "First Call",
            value: 23
        }, {
            label: "Re Call",
            value: 17
        }, {
            label: "Intrested",
            value: 13
        }, {
            label: "Not Intrested",
            value: 17
        }],
        resize: true
    });

    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: '2 Feb',
            a: 100,
         
        }, {
            y: '3 Feb',
            a: 75,
           
        }, {
            y: '4 Feb',
            a: 50,
          
        }, {
            y: '5 Feb',
            a: 75,
         
        }, {
            y: '6 Feb',
            a: 50,
       
        }, {
            y: '7 Feb',
            a: 75,
        
        }, {
            y: '8 Feb',
            a: 100,
          
        }],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Series A'],
        hideHover: 'auto',
        resize: true
    });

});
