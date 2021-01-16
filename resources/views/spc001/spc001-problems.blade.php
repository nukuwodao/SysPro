<x-app-layout>
    <section class="t-section">
        <nav class="navbar navbar-default">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="home-tab"  href="./top" role="tab" aria-controls="home" aria-selected="false">
                        <i class="fas fa-home"></i>トップ
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="problem-tab"  href="./problem" role="tab" aria-controls="profile" aria-selected="true">
                        <i class="fas fa-pencil-alt"></i>問題
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="submit-tab"  href="./submit" role="tab" aria-controls="contact" aria-selected="false">
                        <i class="fas fa-paper-plane"></i>提出
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="result-tab"  href="./result" role="tab" aria-controls="contact" aria-selected="false">
                        <i class="fas fa-database"></i>提出結果
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="codetest-tab" href="./code-test" role="tab" aria-controls="contact" aria-selected="false">
                        <i class="fas fa-file-alt"></i>コードテスト
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="ranking-tab"  href="./ranking" role="tab" aria-controls="contact" aria-selected="false">
                        <i class="fas fa-crown"></i>ランキング
                    </a>
                </li>
            </ul>
        </nav>
        <section class="c_body">
            <h2>問題</h2>
            <hr>
            <div>
                <table class='table table-stripe' id="lingTable">
                    <thead>
                    <tr><th>問題番号</th><th>問題名</th><th>得点</th><th>実行制限時間</th>
                        </th><th>メモリ制限</th></tr>
                    </thead>
                </table>
            </div>
            <hr>


            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
            <!-- 独自定義JS -->
            <script type="text/javascript">
                const Data = [
                    {id:"A",name:"A -Password-",point:"100",time:'2秒',memory:"1024MB"},
                    {id:"B",name:"B -Social Distance ",point:"100",time:'2秒',memory:"1024MB"},
                    {id:"C",name:"C -Buffet-",point:"200",time:'2秒',memory:"1024MB"},
                    {id:"D",name:"D -Maximal Value-",point:"200",time:'2秒',memory:"1024MB"},
                    {id:"E",name:"E -Rain Flows into Dams-",point:"400",time:'2秒',memory:"1024MB"}
                ];
                const dtSetting={
                    destroy: true,
                    data: Data,
                    language: {
                        url: "https://cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Japanese.json"
                    },
                    columns: [
                        { data: "id"},
                        {
                            data: "name",
                            render: function (data, type, row) {
                                var route = row.id;
                                var out = "./problem-"+route;
                                var h_pre = "<a href=\""+out+"\">"
                                var h_back = '</a>';
                                var a_name = data;
                                var hout = h_pre+a_name+h_back;
                                return hout;
                            }
                        },
                        { data: "point"},
                        { data: "time"},
                        { data: "memory"}
                    ],
                    lengthChange: false,
                    searching: false,
                    ordering: false,
                    info: false,
                    paging: false,
                    scrollX: true,
                    columnDefs: [
                        {targets: 0, width: 80},
                        {targets: 1, width: 300},
                        {targets: 2, width: 50},
                        {targets: 3, width: 100},
                        {targets: 4, width: 100}
                    ]
                };
                $('#lingTable').DataTable(dtSetting);
            </script>
        </section>
    </section>
    <x-timer code="spc001" />
</x-app-layout>
