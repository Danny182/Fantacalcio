/* cambio modulo */
    function change_module(value){
            //riattivo tutti gli elementi
            active_elements();
            if(value == '442'){
                $(".dif3").fadeOut(400);
                $(".cen1").fadeOut(400);
                $(".att1").fadeOut(400);
            }
            if(value == '343'){
                $(".dif1").fadeOut(400);
                $(".dif5").fadeOut(400);
                $(".cen1").fadeOut(400);
            }
            if(value == '352'){
                $(".dif1").fadeOut(400);
                $(".dif5").fadeOut(400);
                $(".att1").fadeOut(400);
            }
            if(value == '433'){
                $(".dif3").fadeOut(400);
                $(".cen5").fadeOut(400);
                $(".cen4").fadeOut(400);
            }
            if(value == '451'){
                $(".dif3").fadeOut(400);
                $(".att2").fadeOut(400);
                $(".att3").fadeOut(400);
            }
            if(value == '253'){
                $(".dif3").fadeOut(400);
                $(".dif1").fadeOut(400);
                $(".dif5").fadeOut(400);
            }
            if(value == '532'){
                $(".cen4").fadeOut(400);
                $(".cen5").fadeOut(400);
                $(".att1").fadeOut(400);
            }
            if(value == '541'){
                $(".cen1").fadeOut(400);
                $(".att2").fadeOut(400);
                $(".att3").fadeOut(400);
            }
            if(value == '550'){
                $(".att1").fadeOut(400);
                $(".att2").fadeOut(400);
                $(".att3").fadeOut(400);
            }

    }

    function active_elements(){
        $(".dif1").fadeIn(50);
        $(".dif2").fadeIn(50);
        $(".dif3").fadeIn(50);
        $(".dif4").fadeIn(50);
        $(".dif5").fadeIn(50);
        $(".cen1").fadeIn(50);
        $(".cen2").fadeIn(50);
        $(".cen3").fadeIn(50);
        $(".cen4").fadeIn(50);
        $(".cen5").fadeIn(50);
        $(".att1").fadeIn(50);
        $(".att2").fadeIn(50);
        $(".att3").fadeIn(50);
    }