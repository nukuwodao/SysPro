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
                <h2>B -Social Distance-</h2>
            </span>
            <hr>
            <p>実行時間制限: 2 sec / メモリ制限: 1024 MB</p>
            <p>配点:100点</p>
            <hr>
            <span>
                <h3>問題文</h3>
                <p>$D$次元空間上に$N$個の点があります。</p>
                <p>$i$番目の点の座標は$(X_{i2},X_{i2},...,X_{iD})$です。</p>
                <p>座標$(y_1,y_2,...,y_D)$の点と座標$(z_1,z_2,...,z_D$の点の距離は$\sqrt{(y_1-z_1)^2+(y_2-z_2)^2+...+(y_D-z_D)^2}$です。</p>
                <p>$i$番目の点と$j$番目の点の距離が整数となるような組$(i,j)(i$$<$$j)$はいくつあるでしょうか。</p>
            </span>
            <span>
                <h3>制約</h3>
                <ul class="constraint">
                    <li>入力はすべて整数である。</li>
                    <li>$2\le$$N\le$$10$</li>
                    <li>$2\le$$D\le$$10$</li>
                    <li>$-20\le$$X_{ij}\le$$20$</li>
                    <li>同じ座標の点は与えられない。すなわち，$i\neq$$j$ならば$X_{ik}\neq$$X_{jk}$なる$k$が存在する。</li>
                </ul>
            </span>
            <hr>
            <span>
                <h3>入力</h3>
                <p>入力は以下の形式で標準入力から与えられる。</p>
                <div class="output col-xs-12 col-sm-8 col-md-8 col-lg-7">
                    <p>$N D$</p>
                    <p>$X_{11} X_{12} ... X_{1D}$</p>
                    <p>$X_{21} X_{22} ... X_{2D}$</p>
                    <p>$\vdots$</p>
                    <p>$X_{N1} X_{N2} ... X_{ND}$</p>
                </div>
            </span>
            <span>
                <h3>出力</h3>
                <p>$i$番目の点と$j$番目の点の距離が整数となるような組$(i,j)(i$$<$$j)$の数を出力せよ。</p>
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
                <textarea placeholder="test" class="form-control col-xs-12 col-sm-8 col-md-8 col-lg-7" id="demo1" rows="4" readonly>3 2&NewLine;1 2&NewLine;5 5&NewLine;-2 8</textarea>
            </span>
            <span clss="row">
                <div class="input-exe">
                    <h3>出力例 1</h3>
                </div>
                <textarea class="form-control col-xs-12 col-sm-8 col-md-8 col-lg-7" id="exampleFormControlTextarea1" rows="2" readonly>1</textarea>
                <p>以下のように距離が整数とあなる点の組は$1$組です。</p>
                <ul class="inp_exec">
                    <li>$1$番目の点と$2$番目の点の距離は$\sqrt{|1-5|^2+|2-5|^2}=5$</li>
                    <li>$2$番目の点と$3$番目の点の距離は$\sqrt{|5-(-2)|^2+|5-8|^2}=\sqrt{58}$で、これは整数ではありません。</li>
                    <li>$3$番目の点と$1$番目の距離は$\sqrt{|-5-1|^2+|8-2|^2}=3\sqrt{5}$で、これは整数ではありません。</li>
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
                <textarea class="form-control col-xs-12 col-sm-8 col-md-8 col-lg-7" id="demo2" rows="4" readonly>3 4&NewLine;-3 7 8 2&NewLine;-12 1 10 2&NewLine;-2 8 9 3</textarea>
            </span>
            <span clss="row">
                <div class="input-exe">
                    <h3>出力例 2</h3>
                </div>
                <textarea class="form-control col-xs-12 col-sm-8 col-md-8 col-lg-7" id="exampleFormControlTextarea1" rows="2" readonly>2</textarea>
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
                <textarea placeholder="test" class="form-control col-xs-12 col-sm-8 col-md-8 col-lg-7" id="demo3" rows="6" readonly>5 1&NewLine;1&NewLine;2&NewLine;3&NewLine;4&NewLine;5</textarea>
            </span>
            <span clss="row">
                <div class="input-exe">
                    <h3>出力例 3</h3>
                </div>
                <textarea class="form-control col-xs-12 col-sm-8 col-md-8 col-lg-7" id="exampleFormControlTextarea1" rows="2" readonly>10</textarea>
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
                const select = "B";
                const Problem_name = "B -Social Distance-";
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
