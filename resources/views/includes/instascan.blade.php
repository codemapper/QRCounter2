<script type="text/javascript" src="/js/instascan.min.js"></script>
<script type="text/javascript">
    window.onload = function() {
        var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
        let scanner;
        var prev = document.getElementById('prev');
        var years = document.getElementById('years');
        if (isMobile) {
            scanner = new Instascan.Scanner({mirror: false, video: prev});
        } else {
            scanner = new Instascan.Scanner({mirror: true, video: prev});
        }


        scanner.addListener('scan', function (code) {
            scanner.stop;
            if (document.contains(prev)) {
                prev.style.border = "thick solid #00FF00";
                //prev.remove();
            }
            $.ajax({
                url: "{!! $route !!}",
                type: 'get',
                data: {"code": code, 'X-CSRF-Token': '{{ csrf_token() }}'},
                success: function (jsonData) {
                    var data = JSON.parse(jsonData);
                    console.log(data.data);
                    feedback.innerHTML = data.data;
                    prev.style.border = "none";

                    if(data.redirect != null)
                    setTimeout(function () {
                        window.open(data.redirect,data.target);
                        if(data.target == "_blank"){
                            window.open("/","_self");
                        }
                    }, data.timeout);
                }
            });
        });

        var entityMap = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#39;',
            '/': '&#x2F;',
            '`': '&#x60;',
            '=': '&#x3D;'
        };

        function escapeHtml(string) {
            return String(string).replace(/[&<>"'`=\/]/g, function (s) {
                return entityMap[s];
            });
        }

        Instascan.Camera.getCameras().then(function (cameras) {
            if (cameras.length > 0 && cameras.length < 2) {
                scanner.start(cameras[0]);
            } else if (cameras.length > 1) {
                scanner.start(cameras[1]);
            } else {
                console.error('No cameras found.');
            }
        }).catch(function (e) {
            console.error(e);
        });
    }
</script>