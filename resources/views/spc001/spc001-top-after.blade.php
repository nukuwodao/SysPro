<x-app-layout>
    <section class="t-section">
        <nav class="navbar navbar-default">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab"  href="./top" role="tab" aria-controls="home" aria-selected="true">
                        <i class="fas fa-home"></i>トップ
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
            <h1 class="top" class="top">SystemInfo. Programing Contest 001</h1>
            <h2>コンテスト情報</h2>
            <ul class="contest_list">
                <li>システム情報科学コースの第1回プログラミングコンテストです。</li>
                <li>コンテスト時間: 100分</li>
            </ul>
            <h2>配点</h2>
            <table class='table table-stripe' id="atTable">
                <thead>
                <tr><th>問題</th><th>点数</th></tr>
                </thead>
            </table>
            <h2>ルール</h2>
            <ul class="rule_list">
                <li>今回は制作の都合上，言語はc++のみです．</li>
                <li>コンテスト中に問題に正解すると得点を獲得できます．</li>
                <li>順位は総合得点により決定します．</li>
                <li>同店の場合は提出時間の早い人が上位となります．</li>
                <li>今回はAtcoderのABC133，ABC140の問題を使用しています．</li>
            </ul>
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
    <script>
        const Data = [
            {id:"A",point:"100"},
            {id:"B",point:"100"},
            {id:"C",point:"200"},
            {id:"D",point:"200"},
            {id:"E",point:"400"}
        ];
        const dtSetting={
            destroy: true,
            data: Data,
            language: {
                url: "https://cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Japanese.json"
            },
            columns: [
                { data: "id"},
                { data: "point"},
            ],
            lengthChange: false,
            searching: false,
            ordering: false,
            info: false,
            paging: false,
            scrollX: true,
            columnDefs: [
                {targets: 0, width: 300},
                {targets: 1, width: 300}
            ]
        };
        $('#atTable').DataTable(dtSetting);
    </script>
    </section>
</x-app-layout>
