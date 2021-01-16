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
                <h2>C -Buffet-</h2>
            </span>
            <hr>
            <span>
                <h3>問題文</h3>
                <p>肥満児の昂允ことたかちゃんは$N$種類の料理が食べ放題のビュッフェに行き、全種類の料理(料理$1$,料理$2,...,$料理$N$)を$1$度ずつ食べました。</p>
                <p>たかちゃんが$i(1\le$$i\le$$N)$番目に食べた料理は料理$A_i$でした。</p>
                <p>たかちゃんは料理$i(1\le$$i\le$$N)$を食べると満足度料理$B_i$を得ます。</p>
                <p>また、料理$i(1\le$$i\le$$N)$を食べた直後に料理$i+1$を食べると$C_i$を追加で得ます。</p>
                <p>たかちゃんが得た満足度の合計を求めてください。</p>
            </span>
            <span>
                <h3>制約</h3>
                <ul class="constraint">
                    <li>入力はすべて整数である。</li>
                    <li>$2\le$$N\le$$20$</li>
                    <li>$1\le$$A_i\le$$10$</li>
                    <li>$A_1,A_2,...,A_N$はすべて異なる</li>
                    <li>$1\le$$B_i\le$$50$</li>
                    <li>$1\le$$C_i\le$$50$</li>
                </ul>
            </span>
            <hr>
            <span>
                <h3>入力</h3>
                <p>入力は以下の形式で標準入力から与えられる。</p>
                <div class="output col-xs-12 col-sm-8 col-md-8 col-lg-7">
                    <p>$N$</p>
                    <p>$A_1 A_2 ... A_N$</p>
                    <p>$B_1,B_2,...,B_N$</p>
                    <p>$C_1,C_2,...,C_{N-1}$</p>
                </div>
            </span>
            <span>
                <h3>出力</h3>
                <p>たかちゃんが得た満足度の合計を整数で出力せよ。</p>
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
                <textarea placeholder="test" class="form-control col-xs-12 col-sm-8 col-md-8 col-lg-7" id="demo1" rows="4" readonly>3&NewLine;3 1 2&NewLine;2 5 4&NewLine;3 6</textarea>
            </span>
            <span clss="row">
                <div class="input-exe">
                    <h3>出力例 1</h3>
                </div>
                <textarea class="form-control col-xs-12 col-sm-8 col-md-8 col-lg-7" id="exampleFormControlTextarea1" rows="2" readonly>14</textarea>
                <p>以下のようにたかちゃんは合計14の満足度を得ました。</p>
                <ul class="inp_exec">
                    <li>たかちゃんはまず料理$3$を食べ、満足度$4$を得ました。</li>
                    <li>たかちゃんは次に料理$1$を食べ、満足度$2$を得ました。</li>
                    <li>たかちゃんは最後に料理$2$を食べ、満足度$5+3=8$を得ました。</li>
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
                <textarea class="form-control col-xs-12 col-sm-8 col-md-8 col-lg-7" id="demo2" rows="4" readonly>4&NewLine;2 3 4 1&NewLine;13 5 8 24&NewLine;45 9 15</textarea>
            </span>
            <span clss="row">
                <div class="input-exe">
                    <h3>出力例 2</h3>
                </div>
                <textarea class="form-control col-xs-12 col-sm-8 col-md-8 col-lg-7" id="exampleFormControlTextarea1" rows="2" readonly>74</textarea>
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
                <textarea placeholder="test" class="form-control col-xs-12 col-sm-8 col-md-8 col-lg-7" id="demo3" rows="4" readonly>2&NewLine;1 2&NewLine;50 50&NewLine;50</textarea>
            </span>
            <span clss="row">
                <div class="input-exe">
                    <h3>出力例 3</h3>
                </div>
                <textarea class="form-control col-xs-12 col-sm-8 col-md-8 col-lg-7" id="exampleFormControlTextarea1" rows="2" readonly>150</textarea>
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
                const select = "C";
                const Problem_name = "C -Buffet-";
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
