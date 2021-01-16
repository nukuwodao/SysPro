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
            <span>
                <h2>E -Rain Flows into Dams-</h2>
            </span>
            <hr>
            <p>実行時間制限: 2 sec / メモリ制限: 1024 MB</p>
            <p>配点:400点</p>
            <hr>
            <span>
                <h3>問題文</h3>
                <p>円形に$N$の山が連なっており、時計回りに山$1,$山$2,...,$山$N$と呼ばれます。$N$は奇数です。</p>
                <p>これらの山の間に$N$個のダムがあり、ダム$1,$ダム$2,$$,...,$ダム$N$と呼ばれます。ダム$i(1\le$$i\le$$N)$は山$i$と山$i+1$の間にあります(山$N+1$は山$1$のことを指します)。</p>
                <p>山$i(1\le$$i\le$$M)$に$2x$リットルの雨が降ると、ダム$i-1$とダム$i$にそれぞれr$x$リットルずつ水が溜まります(ダム$0$はダム$N$の事を指します)。</p>
                <p>その結果、ダム$i(1\le$$i\le$$N)$には合計で$A_i$リットルの水が溜まりました。</p>
                <p>各山に振った雨の量を求めてください。この問題の制約下では買いが一意に定まることが証明できます。</p>
            </span>
            <span>
                <h3>制約</h3>
                <ul class="constraint">
                    <li>入力は全て整数である。</li>
                    <li>$3\le$$N\le$$10^5-1$</li>
                    <li>$N$は奇数である。</li>
                    <li>$0\le$$A_i\le$$10^9$</li>
                    <li>入力が表す状況は、各山に非負の偶数リットルの雨が降った際に発生しうる。</li>
                </ul>
            </span>
            <hr>
            <span>
                <h3>入力</h3>
                <p>入力は以下の形式で標準入力から与えられる。</p>
                <div class="output col-xs-12 col-sm-8 col-md-8 col-lg-7">
                    <p>$N$</p>
                    <p>$A_1 A_2 ... A_N$</p>
                </div>
            </span>
            <span>
                <h3>出力</h3>
                <p>山$1,$山$2,...,$山$A_N$に振った雨の量を表す$N$個の整数をこの順に出力せよ。</p>
            </span>
            <hr>
            <span clss="row">
                <div class="input-exe">
                    <h3>入力例 1</h3>
                    <a class="bt-samp" id="demo1">Copy</a>
                    <div class="balloon1" id="demo1">
                        <p>Copied!</p>
                    </div>
                </div>
                <textarea placeholder="test" class="form-control col-xs-12 col-sm-8 col-md-8 col-lg-7" id="demo1" rows="2" readonly>3&NewLine;2 2 4</textarea>
            </span>
            <span clss="row">
                <div class="input-exe">
                    <h3>出力例 1</h3>
                </div>
                <textarea class="form-control col-xs-12 col-sm-8 col-md-8 col-lg-7" id="exampleFormControlTextarea1" rows="2" readonly>4 0 4</textarea>
                <p>山$1,2,3$に振った雨の量をそれぞれ$4$リットル、$0$リットル、$4$リットルとすると以下のように辻褄が合います。</p>
                <ul class="inp_exec">
                    <li>ダム$1$には$4/2+0/2=2$リットルの水が溜まります。</li>
                    <li>ダム$2$には$0/2+4/2=2$リットルの水が溜まります。</li>
                    <li>ダム$3$には$4/2+4/2=4$リットルの水が溜まります。</li>
                </ul>
            </span>
            <hr>
            <span clss="row">
                <div class="input-exe">
                    <h3>入力例 2</h3>
                    <a class="bt-samp" id="demo2">Copy</a>
                    <div class="balloon1" id="demo2">
                        <p>Copied!</p>
                    </div>
                </div>
                <textarea class="form-control col-xs-12 col-sm-8 col-md-8 col-lg-7" id="demo2" rows="2" readonly>5&NewLine;3 8 7 5 5</textarea>
            </span>
            <span clss="row">
                <div class="input-exe">
                    <h3>出力例 2</h3>
                </div>
                <textarea class="form-control col-xs-12 col-sm-8 col-md-8 col-lg-7" id="exampleFormControlTextarea1" rows="2" readonly>2 4 12 2 8</textarea>
            </span>
            <hr>
            <span clss="row">
                <div class="input-exe">
                    <h3>入力例 3</h3>
                    <a class="bt-samp" id="demo3">Copy</a>
                    <div class="balloon1" id="demo3">
                        <p>Copied!</p>
                    </div>
                </div>
                <textarea placeholder="test" class="form-control col-xs-12 col-sm-8 col-md-8 col-lg-7" id="demo3" rows="2" readonly>3&NewLine;1000000000 1000000000 0</textarea>
            </span>
            <span clss="row">
                <div class="input-exe">
                    <h3>出力例 3</h3>
                </div>
                <textarea class="form-control col-xs-12 col-sm-8 col-md-8 col-lg-7" id="exampleFormControlTextarea1" rows="2" readonly>2000000000</textarea>
            </span>
            <hr>
            <span>
                <h3>提出</h3>
                <form>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="sourceCode">ソースコード</label>
                        <div class="col-sm-7" id="sourceCode">
                            <textarea id="code" name="code"></textarea>
                            <p><span class="gray">※ 512 KiB まで</span><br></p>
                            <script>
                                var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
                                    mode: "text/x-c++src",
                                    theme: "mbo",
                                    indentUnit: 4,
                                    indentWithTabs: false,
                                    tabMode: "shift",
                                    enterMode: "keep",
                                    electricChars: false,
                                    lineNumbers: true,
                                    firstLineNumber: 1,
                                    gutter: false,
                                    fixedGutter:false,
                                    matchBrackets: true
                                });
                            </script>
                            <div class="form-group"><label class="control-label col-sm-2"></label>
                                <div class="col-sm-5"> <input class="btn btn-primary"  type="button" value="提出" onclick="func_submit()"/></div>
                            </div>
                        </div>
                    </div>
                </form>
            </span>
        </section>
        <script type = "text/javascript">
            function func_submit(){
                const select = "E";
                const Problem_name = "E -Rain Flows into Dams-";
                const SourceCode = editor.getValue();
                const user_id = "{{ Auth::user()->id }}";
                const c_code = "spc001";

                const send = {
                    'source': SourceCode,
                    'user_id': user_id,
                    'C_name': c_code,
                    'P_code': select,
                    'P_name': Problem_name
                };

                $.ajax({
                    type: 'GET',
                    url: '/submit-send',
                    dataType: 'json',
                    data: {
                        'source': SourceCode,
                        'user_id': user_id,
                        'C_name': c_code,
                        'P_code': select,
                        'P_name': Problem_name
                    },
                    beforeSend: function() {
                        window.location.href = <?php echo json_encode(url('/spc001/result')); ?>;
                        console.log(send);
                    }
                }).done(function(data){
                    //通信成功
                    console.log(data);
                }).fail(function(data){
                    //通信失敗
                    console.log('通信失敗');
                })
            }
        </script>
    </section>
    <x-timer code="spc001" />
</x-app-layout>
