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

//    var content = "test";
        scanner.addListener('scan', function (content) {
            scanner.stop;
            if (document.contains(prev)) {
                prev.style.border = "thick solid #00FF00";
                prev.remove();
            }
            $.ajax({
                url: "{!! route('scan.store',['station' => $station, 'point' => $point]) !!}",
                type: 'get',
                data: {"code": content, 'X-CSRF-Token': '{{ csrf_token() }}'},
                success: function (data) {
                    console.log(data);
                    years.innerHTML = data;

                    setTimeout(function () {
                        document.location.href = "{!! route('scan.station',['station' => $station]) !!}";
                    }, 2000);
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