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
                        <a class="nav-link" id="codetest-tab" href="./code-test" role="tab" aria-controls="contact" aria-selected="false">
                            <i class="fas fa-file-alt"></i>コードテスト
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <section class="c_body">
        <span>
            <h2>A -practice problem-</h2>
        </span>
            <hr>
            <p>
                実行時間制限: 2 sec / メモリ制限: 1024 MB

            </p>
            <p>配点:100点</p>
            <hr>
            <span>
            <h3>問題文</h3>
                <p>制シス$N$人で旅行しており、その交通手段として電車とタクシーがあります。</p>
                <p>電車を使うと$1$人当たり$A$円かかります。</p>
                <p>タクシーを使うと$N$人で$B$円かかります。</p>
                <p>全員の交通費の合計は最小でいくらになるでしょうか。</p>
        </span>
            <span>
            <h3>制約</h3>
                <ul class="constraint">
                    <li>入力はすべて整数である。</li>
                    <li>$1\le$ $N\le$$20$</li>
                    <li>$1\le$ $A\le$$50$</li>
                    <li>$1\le$ $B\le$$50$</li>
                </ul>
        </span>
            <hr>
            <span>
                <h3>入力</h3>
                <div class="output col-xs-12 col-sm-8 col-md-8 col-lg-7">
                    <p>$N$ $A$ $B$</p>
                </div>
        </span>
        <span>
            <h3>出力</h3>
            <p>最小の合計交通費を表す整数を出力せよ。</p>
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
            <textarea placeholder="test" class="form-control col-xs-12 col-sm-8 col-md-8 col-lg-7" id="demo1" rows="2" readonly>4 2 9</textarea>
        </span>

            <span clss="row">
            <div class="input-exe">
                <h3>出力例 1</h3>
            </div>
            <textarea class="form-control col-xs-12 col-sm-8 col-md-8 col-lg-7" id="exampleFormControlTextarea1" rows="2" readonly>8</textarea>
        </span>

            <span clss="row">
            <div class="input-exe">
                <h3>入力例 2</h3>
                <a class="bt-samp" id="demo2">Copy</a>
                <div class="balloon1" id="demo2">
                    <p>Copied!</p>
                </div>
            </div>

            <textarea class="form-control col-xs-12 col-sm-8 col-md-8 col-lg-7" id="demo2" rows="2" readonly>4 2 7</textarea>
        </span>
            <span clss="row">
            <div class="input-exe">
                <h3>出力例 2</h3>
            </div>

            <textarea class="form-control col-xs-12 col-sm-8 col-md-8 col-lg-7" id="exampleFormControlTextarea1" rows="2" readonly>7</textarea>
        </span>

            <pan clss="row">
            <div class="input-exe">
                <h3>入力例 3</h3>
                <a class="bt-samp" id="demo3">Copy</a>
                <div class="balloon1" id="demo3">
                    <p>Copied!</p>
                </div>
            </div>
            <textarea placeholder="test" class="form-control col-xs-12 col-sm-8 col-md-8 col-lg-7" id="demo3" rows="2" readonly>4 2 8</textarea>
            </span>

            <span clss="row">
            <div class="input-exe">
                <h3>出力例 3</h3>
            </div>
            <textarea class="form-control col-xs-12 col-sm-8 col-md-8 col-lg-7" id="exampleFormControlTextarea1" rows="2" readonly>8</textarea>
        </span>
            <hr>
            <span>
            <h3>提出</h3>
            <form>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="sourceCode">ソースコード</label>
                    <div class="col-sm-7" id="sourceCode">
                        <textarea id="code" name="code"></textarea>
                        <p>
                            <span class="gray">※ 512 KiB まで</span><br>
                        </p>
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
            <script type = "text/javascript">
                function func_submit(){
                    const select = "A";
                    const Problem_name = "A-practice problem-";
                    const SourceCode = editor.getValue();
                    const user_id = "{{ Auth::user()->id }}";
                    const c_code = "practice";

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
                            window.location.href = <?php echo json_encode(url('/practice/result')); ?>;
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
            <hr>
        </section>
    </section>
</x-app-layout>
