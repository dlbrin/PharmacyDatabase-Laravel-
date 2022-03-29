@extends('layout.nav')

@section('content')
<div class="sale-product">
    <div class="sale-camira">
        <canvas width="320" height="240" id="webcodecam-canvas"></canvas><br>
        <span class="notify text-center mt-3 mb-3 text-danger"></span>
        <button title="Play" class="btn btn-success btn-sm" id="play" type="button" data-toggle="tooltip">Play</button><br>
        <select class="form-control" id="camera-select"></select>
    </div>
    <div class="all-invoice invoice">
    
    </div>
</div>
<div class="viewtb"></div>



<script type="text/javascript" src="{{asset('/assets/lib/qrcodelib.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/lib/webcodecamjs.js')}}"></script>
<script>
    function sound(sound){
        var obj = document.createElement("audio");
        obj.src = "assets/audio/" + sound + ".mp3";
        obj.play();
    }
    function table(){
        $.post('viewtb' , {_token : '{{csrf_token()}}'} , function(response){
            $(".viewtb").html(response);
        })
    }
    function invoice(){
        $.post('invoice' , {_token : '{{csrf_token()}}'} , function(response){
            $(".invoice").html(response);
        })
    }
    function undo(sold_id){
        $.post('undo' , {
            sold_id : sold_id,
            _token : '{{csrf_token()}}'
        }, function(response){
            if(response === "success"){
                invoice();
                table();
                sound('undo');
            }else{
                table();
                sound('fail')
            }
        });
    }
    
    (function(undefined) {
    "use strict";
    function Q(el) {
        if (typeof el === "string") {
            var els = document.querySelectorAll(el);
            return typeof els === "undefined" ? undefined : els.length > 1 ? els : els[0];
        }
        return el;
    }
    
    var play = Q("#play"),
    args = {
        resultFunction: function(res) {
            var id = res.code;

            $.post('sale' , {
                id:id , 
                _token : '{{csrf_token()}}'
            }, function(response){
                if(response === "success"){
                    table();
                    invoice();
                }else{
                    sound('fail')
                    $(".notify").html(response);
                }
            });
        }
        
    };
    var decoder = new WebCodeCamJS("#webcodecam-canvas").buildSelectMenu("#camera-select", "environment|back").init(args);
    play.addEventListener("click", function() {
        decoder.play();
    }, false);
  
    document.querySelector("#camera-select").addEventListener("change", function() {
        if (decoder.isInitialized()) {
            decoder.stop().play();
        }
    });
}).call(window.Page = window.Page || {});
</script>
@endsection