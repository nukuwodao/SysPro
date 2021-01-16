<x-app-layout>
    <section class="t-section">
        <div>
            <nav class="navbar navbar-default">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="home-tab"  href="./top" role="tab" aria-controls="home" aria-selected="false">
                            <i class="fas fa-home"></i>トップ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="problem-tab"  href="./problem" role="tab" aria-controls="profile" aria-selected="false">
                            <i class="fas fa-pencil-alt"></i>問題
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="submit-tab"  href="./submit" role="tab" aria-controls="contact" aria-selected="false">
                            <i class="fas fa-paper-plane"></i>提出
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="result-tab"  href="./result" role="tab" aria-controls="contact" aria-selected="true">
                            <i class="fas fa-database"></i>提出結果
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="codetest-tab" href="./code-test" role="tab" aria-controls="contact" aria-selected="false">
                            <i class="fas fa-file-alt"></i>コードテスト
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <section class="c_body">
            <?php
            $id = Auth::id();
            $user_data = DB::table('users')->where('id','=',$id)->first();
            $presence_status = DB::table('submit')->where('Contest_name',"=",'practice')->where('user_id','=',$id)->exists();
            $Data = null;
            if($presence_status){
                $Data = DB::table('submit')->where('Contest_name',"=",'practice')->where('user_id','=',$id)->get();
            }
            $result_presence = $user_result = DB::table('practice')->where('user','=',$id)->exists();
            $user_result = null;
            if($result_presence){
                $user_result = DB::table('practice')->where('user','=',$id)->first();
            }
            ?>
            <h2>提出結果</h2>
            <div class="result">
                <div class="name">
                    <p>ユーザ名: </p><p id="user"></p>
                </div>
            </div>

            <div>
                <table class='table table-stripe' id="lingTable">
                    <thead>
                    <tr><th>提出時刻</th><th>問題</th><th>得点</th>
                        <th>提出結果</th></tr>
                    </thead>
                </table>
            </div>

            <script
                src="https://code.jquery.com/jquery-3.3.1.min.js"
                integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
            <!-- 独自定義JS -->
            <script type="text/javascript">
                var pre_num = 0;
                var num = 0;
                var pre_status = null;
                var status = null;
                var Data = null;
                const user_data = <?php echo json_encode($user_data); ?>;
                const init_data = <?php echo json_encode($Data); ?>;
                console.log( <?php echo $id; ?>);
                //まず表示
                if(init_data!==null){
                    const dtSetting={
                        destroy: true,
                        data: init_data,
                        language: {
                            url: "https://cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Japanese.json"
                        },
                        order: [ [0, "desc"] ],
                        columns: [
                            { data: "created_at"},
                            { data: "Problem_name"},
                            { data: "points"},
                            { data: "Status",
                                render: function(arg){
                                    if(arg===null){
                                        return '<button class="btn btn-primary" type="button" disabled>\n' +
                                            '  <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>\n' +
                                            '  判定中...\n' +
                                            '</button>';
                                    }else if(arg==="AC"){
                                        //return '<span class="badge badge-success">${art}</span>';
                                        return "<span class=\"badge badge-success\">" + arg + "</span>";
                                    }else{
                                        return "<span class=\"badge badge-warning\">" + arg + "</span>";
                                    }
                                }
                            }
                        ],
                        lengthChange: false,
                        scrollX: true,
                        columnDefs: [
                            {targets: 0, width: 200},
                            {targets: 1, width: 300},
                            {targets: 2, width: 100},
                            {targets: 3, width: 200}
                        ]
                    };
                    $('#lingTable').DataTable(dtSetting);
                }else{
                    $('#lingTable').DataTable({
                        destroy: true,
                        data: Data,
                        language: {
                            url: "https://cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Japanese.json"
                        },
                        lengthChange: false,
                        scrollX: true,
                        columnDefs: [
                            {targets: 0, width: 200},
                            {targets: 1, width: 300},
                            {targets: 2, width: 100},
                            {targets: 3, width: 200}
                        ]
                    });
                }
                document.getElementById("user").innerHTML = user_data['name'];
                window.onload = function(){
                    setInterval("result()", 1000);
                }

                function result(){
                    //データを取ってくる
                    $.ajax({
                        type: 'GET',
                        url: '/database-access',
                        dataType: 'json',
                        data: {
                            'user_id': <?php echo $id; ?>,
                            'C_name': 'practice',
                            'C_code': 'practice'
                        }
                    }).done(function(data){
                        //通信成功
                        Data = data['Data'];
                        num = Data.length;
                        status = data['status'];
                        if(num!==pre_num||status!==pre_status){
                            load();
                        }
                        pre_num = num;
                        pre_status = status;
                    }).fail(function(data){
                        //通信失敗
                        console.log('通信失敗');
                    })
                }

                function load(){
                    const dtSetting={
                        destroy: true,
                        data: Data,
                        language: {
                            url: "https://cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Japanese.json"
                        },
                        order: [ [1, "desc"] ],
                        columns: [
                            { data: "created_at"},
                            { data: "Problem_name"},
                            { data: "points"},
                            { data: "Status",
                                render: function(arg){
                                    if(arg===null){
                                        return '<button class="btn btn-primary" type="button" disabled>\n' +
                                            '  <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>\n' +
                                            '  判定中...\n' +
                                            '</button>';
                                    }else if(arg==="AC"){
                                        //return '<span class="badge badge-success">${art}</span>';
                                        return "<span class=\"badge badge-success\">" + arg + "</span>";
                                    }else{
                                        return "<span class=\"badge badge-warning\">" + arg + "</span>";
                                    }
                                }
                            }
                        ],
                        lengthChange: false,
                        scrollX: true,
                        columnDefs: [
                            {targets: 0, width: 200},
                            {targets: 1, width: 300},
                            {targets: 2, width: 100},
                            {targets: 3, width: 200}
                        ]
                    };
                    $('#lingTable').DataTable(dtSetting);
                }
            </script>
        </section>
    </section>
</x-app-layout>
