<script type="text/javascript" src="/js/instascan.min.js"></script>
<script type="text/javascript">
    window.onload = function() {
        var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
        let scanner;
        var prev = document.getElementById('prev');
        var years = document.getElementById('logTable');
        if (isMobile) {
            scanner = new Instascan.Scanner({mirror: false, continuous: true, video: prev});
        } else {
            scanner = new Instascan.Scanner({mirror: true, continuous: true, video: prev});
        }

        scanner.addListener('scan', function (content) {
            $.ajax({
                url: "{!! route('scan.code',['code' => $code]) !!}",
                type: 'get',
                data: {"code": content, 'X-CSRF-Token': '{{ csrf_token() }}'},
                success: function (data) {
                    console.log(data);
                    logTable.innerHTML = data;
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