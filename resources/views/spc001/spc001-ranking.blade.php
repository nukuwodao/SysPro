<x-app-layout>
    <?php
    //順位を更新ちんぽ
    //ソートをかけてデータを取得
    $check =  DB::table('spc001')-> exists();
    $data = null;
    if($check){
        $rank = DB::table('spc001')->orderBy('points','desc')->orderBy('u@dated_at','asc')->get();
        $num = count($rank);
        for($i=0;$i<$num;$i++){
            $user_id = $rank[$i]->user;
            //挿入
            DB::table('spc001')->where('user','=',$user_id)->update([
                'rank' => $i+1
            ]);
        }
        //更新したテーブルを取得
        $data = DB::table('spc001')->get();
    }
    ?>
    <section class="t-section">
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
                    <a class="nav-link active" id="ranking-tab"  href="./ranking" role="tab" aria-controls="contact" aria-selected="true">
                        <i class="fas fa-crown"></i>ランキング
                    </a>
                </li>
            </ul>
        </nav>
        <section class="c_body">
            <h2>ランキング</h2>
            <table class='table table-stripe' id="RankingTable">
                <thead>
                <tr><th>順位</th><th>ユーザ名</th><th>タイム</th><th>得点</th><th>A</th><th>B</th><th>C</th><th>D</th><th>E</th></tr>
                </thead>
            </table>
        </section>
    </section>
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
        const Data = <?php echo json_encode($data); ?>;
        if(Data!==null){
            const RnkSetting={
                destroy: true,
                data: Data,
                language: {
                    url: "https://cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Japanese.json"
                },
                order: [0,"asc"],
                columns: [
                    {data: "rank"},
                    {data: "name"},
                    {data: "time"},
                    {data: "points"},
                    {data: "A"},
                    {data: "B"},
                    {data: "C"},
                    {data: "D"},
                    {data: "E"}
                ],
                columnDefs: [
                    {targets: 0, width: 50},
                    {targets: 1, width: 100},
                    {targets: 2, width: 50},
                    {targets: 4, width: 50},
                    {targets: 5, width: 50},
                    {targets: 6, width: 50},
                    {targets: 7, width: 50},
                    {targets: 8, width: 50}
                ],
                lengthChange: false,
                scrollX: true
            }
            $('#RankingTable').DataTable(RnkSetting);
        }else{
            $('#RankingTable').DataTable({
                destroy: true,
                language: {
                    url: "https://cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Japanese.json"
                },
                columnDefs: [
                    {targets: 0, width: 50},
                    {targets: 1, width: 100},
                    {targets: 2, width: 50},
                    {targets: 4, width: 50},
                    {targets: 5, width: 50},
                    {targets: 6, width: 50},
                    {targets: 7, width: 50},
                    {targets: 8, width: 50}
                ],
                lengthChange: false,
                scrollX: true,
            });
        }
    </script>
    <x-timer code="spc001" />
</x-app-layout>
