<x-app-layout>
    <?php $url = url('/practice/result'); ?>
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
                        <a class="nav-link active" id="submit-tab"  href="./submit" role="tab" aria-controls="contact" aria-selected="true">
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
            <h2 class="title">提出</h2>
            <hr>
            <form>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="problem">問題</label>
                    <div class="col-sm-7" id="problem">
                        <script>
                            $(document).ready(function(){
                                $(".select2_01").select2();
                            });
                        </script>
                        <select name = "code" class="select2_01" id="submit_select">
                            <option value="A">問題A -practice problem-</option>
                        </select>
                    </div>

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
                        <hr>
                    </div>
                </div>
            </form>
            <script type = "text/javascript">
                function func_submit(){
                    const select = document.getElementById("submit_select").value;
                    const Problem_name = document.getElementById("submit_select").innerText;
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
        </section>
    </section>
</x-app-layout>
