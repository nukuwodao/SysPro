<x-app-layout>
    <section class="t-section">
        <div class="all_cc_lemon">
            <h1 class="contest_all"><i class="fas fa-award"></i>コンテスト一覧</h1>
            <section class="c_body">
                <div>
                    <h2><i id="held" class="far fa-stop-circle"></i>開催中のコンテスト</h2>
                    <table class='table table-stripe' id="atTable">
                        <thead>
                        <tr><th>開始時刻</th><th>コンテスト名</th><th>時間</th></tr>
                        </thead>
                    </table>
                </div>
                <div>
                    <h2><i class="far fa-stop-circle"></i>常設コンテスト</h2>
                    <table class='table table-stripe' id="parmanentTable">
                        <thead>
                        <tr><th>コンテスト名</th></tr>
                        </thead>
                    </table>
                </div>
                <div>
                    <h2><i id="before" class="far fa-stop-circle"></i>開催予定のコンテスト</h2>
                    <table class='table table-stripe' id="beforeTable">
                        <thead>
                        <tr><th>開始時刻</th><th>コンテスト名</th><th>時間</th></tr>
                        </thead>
                    </table>
                </div>
                <div>
                    <h2><i id="after" class="far fa-stop-circle"></i>終了したコンテスト</h2>
                    <table class='table table-stripe' id="afterTable">
                        <thead>
                        <tr><th>開始時刻</th><th>コンテスト名</th><th>時間</th></tr>
                        </thead>
                    </table>
                </div>
            </section>
        </div>
    </section>
    <?php
    $h_data = null;
    $p_data = null;
    $b_data = null;
    $a_data = null;
    $h_status = DB::table('contest')->where('status','=','H')->exists();
    $p_status = DB::table('contest')->where('status','=','P')->exists();
    $b_status = DB::table('contest')->where('status','=','B')->exists();
    $a_status = DB::table('contest')->where('status','=','A')->exists();

    if($h_status){
        $h_data = DB::table('contest')->where('status','=','H')->get();
    }
    if($p_status){
        $p_data = DB::table('contest')->where('status','=','P')->get();
    }
    if($b_status){
        $b_data = DB::table('contest')->where('status','=','B')->get();
    }
    if($a_status){
        $a_data = DB::table('contest')->where('status','=','A')->get();
    }
    ?>
    <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        const h_data = <?php echo json_encode($h_data); ?>;
        const p_data = <?php echo json_encode($p_data); ?>;
        const b_data = <?php echo json_encode($b_data); ?>;
        const a_data = <?php echo json_encode($a_data); ?>;
        console.log(p_data);
        if(h_data!==null){
            console.log(a_data);
            const atSetting={
                destroy: true,
                data: h_data,
                language: {
                    url: "https://cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Japanese.json"
                },
                columns: [
                    { data: "created_at"},
                    {
                        data: "Contest_name",
                        render: function (data, type, row) {
                            var code = row.Contest_code;
                            var route = "../" + code + "/top";
                            var out = "<a href=\"" + route + "\">";
                            var hout = out + data + '</a>';
                            return hout;
                        }
                    },
                    { data: "contest_time",
                        render: function(arg){
                            return arg + ":00";
                        }
                    }
                ],
                lengthChange: false,
                searching: false,
                paging: false,
                scrollX: true,
                columnDefs: [
                    {targets: 0, width: 200},
                    {targets: 1, width: 600},
                    {targets: 2, width: 100}
                ]
            };
            $('#atTable').DataTable(atSetting);
        }else{
            $('#atTable').DataTable({
                destroy: true,
                language: {
                    url: "https://cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Japanese.json"
                },
                lengthChange: false,
                searching: false,
                paging: false,
                scrollX: true,
                columnDefs: [
                    {targets: 0, width: 200},
                    {targets: 1, width: 600},
                    {targets: 2, width: 100}
                ]
            });
        }
        if(p_data!==null){
            const parmanentSetting = {
                destroy: true,
                data: p_data,
                language: {
                    url: "https://cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Japanese.json"
                },
                columns: [
                    {
                        data: "Contest_name",
                        render: function (data, type, row) {
                            var code = row.Contest_code;
                            var route = "../" + code + "/top";
                            var out = "<a href=\"" + route + "\">";
                            var hout = out + data + '</a>';
                            return hout;
                        }
                    }
                ],
                lengthChange: false,
                searching: false,
                paging: false,
                scrollX: true,
                columnDefs: [
                    {targets: 0, width: 950}
                ]
            }
            $('#parmanentTable').DataTable(parmanentSetting);
        }else{
            $('#parmanentTable').DataTable({
                destroy: true,
                language: {
                    url: "https://cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Japanese.json"
                },
                lengthChange: false,
                searching: false,
                paging: false,
                scrollX: true,
                columnDefs: [
                    {targets: 0, width: 900}
                ]
            });
        }
        if(b_data!==null){
            console.log(a_data);
            const beforeSetting={
                destroy: true,
                data: b_data,
                language: {
                    url: "https://cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Japanese.json"
                },
                columns: [
                    { data: "created_at"},
                    {
                        data: "Contest_name",
                        render: function (data, type, row) {
                            var code = row.Contest_code;
                            var route = "../" + code + "/top";
                            var out = "<a href=\"" + route + "\">";
                            var hout = out + data + '</a>';
                            return hout;
                        }
                    },
                    { data: "contest_time",
                        render: function(arg){
                            return arg + ":00";
                        }
                    }
                ],
                lengthChange: false,
                searching: false,
                paging: false,
                scrollX: true,
                columnDefs: [
                    {targets: 0, width: 200},
                    {targets: 1, width: 600},
                    {targets: 2, width: 100}
                ]
            };
            $('#beforeTable').DataTable(beforeSetting);
        }else{
            $('#beforeTable').DataTable({
                destroy: true,
                language: {
                    url: "https://cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Japanese.json"
                },
                lengthChange: false,
                searching: false,
                paging: false,
                scrollX: true,
                columnDefs: [
                    {targets: 0, width: 200},
                    {targets: 1, width: 600},
                    {targets: 2, width: 100}
                ]
            });
        }
        if(a_data!==null){
            console.log(a_data);
            const afterSetting={
                destroy: true,
                data: a_data,
                language: {
                    url: "https://cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Japanese.json"
                },
                columns: [
                    { data: "created_at"},
                    {
                        data: "Contest_name",
                        render: function (data, type, row) {
                            var code = row.Contest_code;
                            var route = "../" + code + "/top";
                            var out = "<a href=\"" + route + "\">";
                            var hout = out + data + '</a>';
                            return hout;
                        }
                    },
                    { data: "contest_time",
                        render: function(arg){
                            return arg + ":00";
                        }
                    }
                ],
                language: {
                    url: "https://cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Japanese.json"
                },
                lengthChange: false,
                searching: false,
                paging: false,
                scrollX: true,
                columnDefs: [
                    {targets: 0, width: 200},
                    {targets: 1, width: 600},
                    {targets: 2, width: 100}
                ]
            };
            $('#afterTable').DataTable(afterSetting);
        }else{
            $('#afterTable').DataTable({
                destroy: true,
                lengthChange: false,
                searching: false,
                paging: false,
                scrollX: true,
                columnDefs: [
                    {targets: 0, width: 200},
                    {targets: 1, width: 600},
                    {targets: 2, width: 100}
                ]
            });
        }
    </script>
</x-app-layout>
