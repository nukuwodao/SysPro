<div>
    <ul>
    <li class="pull-right"><a id="fix-cnvtb" href="javascript:void(0)"><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span></a></li>
    </ul>
</div>
<div id="errMsgDiv" class="col-sm-12"></div>
    <div class="col-sm-12">
        <h2 class="title">コードテスト</h2>
        <hr>
        <form class="form-horizontal form-code-submit" name="form1">
            <!--<script>
                var currentLang = getLS('defaultLang');
            </script> -->

            <div class="form-group"> <label class="control-label col-sm-2" for="sourceCode">ソースコード</label>
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
                </div>
            </div>
            <div class="form-group" > <label class="control-label col-sm-2" for="input">標準入力</label>
                <div class="col-sm-8">
                    <textarea id="input" name="input" class="form-control customtest-textarea" rows="5"></textarea>
                    <p>
                        <span class="gray">※ 512 KiB まで</span><br>
                    </p>
                </div>
            </div>
            <div id="vue-custom-test">
                <div id = group style="display: block;">
                    <div>
                        <div class="form-group"><label class="control-label col-sm-2"></label>
                            <div class="col-sm-5"> <input id="double" class="btn btn-primary"  type="button" value="実行"></div>
                        </div>
                    </div>
                </div>
                <hr id="before">
                <div class="form-group"><label for="stdout" class="control-label col-sm-2">標準出力</label>
                    <div class="col-sm-8">
                        <textarea id="stdout" rows="5" readonly="readonly" class="form-control customtest-textarea"></textarea>
                    </div>
                </div>
                <div class="form-group"><label for="stderr" class="control-label col-sm-2">標準エラー出力</label>
                    <div class="col-sm-8">
                        <textarea id="stderr" rows="5" readonly="readonly" class="form-control customtest-textarea"></textarea>
                    </div>
                </div>
            </div>
        </form>
        <script type = "text/javascript">
            $('#double').on('click', function() {
                const SourceCode = editor.getValue();
                const input = document.form1.input.value;
                const user_id = "{{ Auth::user()->id }}";

                $('#double').css('pointer-events','none');
;
                $.ajax({
                    type: 'GET',
                    url: '/test',
                    dataType: 'json',
                    data: {
                        'source': SourceCode,
                        'input': input,
                        'user_id': user_id
                    },
                    beforeSend: function() {
                        $('<button id="load" class="btn btn-primary" type="button" disabled>\n' +
                            '  <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>\n' +
                            '  実行待ち...\n' +
                            '</button>').insertAfter('#group');
                        document.getElementById('stdout').value = null;
                        document.getElementById('stderr').value = null;
                        var table = document.getElementById("table");
                        if(table!==null){
                            table.remove();
                        }
                    }
                }).done(function(data){
                    var name = document.getElementById("load");
                    name.remove();

                    console.log(data);

                    //通信成功
                    var status = "";
                    if(data['status']===0){
                        status = "実行完了";
                    }else if(data['status']===2){
                        status = "コンパイルエラー";
                    }else if(data['status']===3){
                        status = "メモリ超過";
                    }else if(data['status']===4){
                        status = "時間超過";
                    }else{
                        status = "エラー";
                    }

                    if(data['status']===0){
                        //実行成功
                        $('<div id="table" class="col-sm-4 col-sm-offset-4">\n' +
                            '  <div class="panel panel-default">\n' +
                            '    <table class="table table-bordered">\n' +
                            '      <tbody>\n' +
                            '        <tr class="success" bgcolor="#cef9dc">\n' +
                            '          <th class="text-center">終了コード</th>\n' +
                            '          <td id="over" class="text-right"></td>\n' +
                            '        </tr>\n' +
                            '        <tr bgcolor="#ffffff">\n' +
                            '          <th class="text-center">実行時間</th>\n' +
                            '          <td id="center" class="text-right"></td>\n' +
                            '        </tr>\n' +
                            '        <tr bgcolor="#ffffff">\n' +
                            '          <th class="text-center">メモリ</th>\n' +
                            '          <td id="under" class="text-right"></td>\n' +
                            '        </tr>\n' +
                            '      </tbody>\n' +
                            '    </table>\n' +
                            '  </div>\n' +
                            '</div>').insertAfter('#before');

                        document.getElementById('stdout').value = data['output'];
                    }else{
                        //エラー
                        $('<div id="table" class="col-sm-4 col-sm-offset-4">\n' +
                            '  <div class="panel panel-default">\n' +
                            '    <table class="table table-bordered">\n' +
                            '      <tbody>\n' +
                            '        <tr bgcolor="#ffd5ec" class="danger">\n' +
                            '          <th class="text-center">終了コード</th>\n' +
                            '          <td id="over" class="text-right"></td>\n' +
                            '        </tr>\n' +
                            '        <tr bgcolor="#ffffff">\n' +
                            '          <th class="text-center">実行時間</th>\n' +
                            '          <td id="center" class="text-right"></td>\n' +
                            '        </tr>\n' +
                            '        <tr bgcolor="#ffffff">\n' +
                            '          <th class="text-center">メモリ</th>\n' +
                            '          <td id="under" class="text-right"></td>\n' +
                            '        </tr>\n' +
                            '      </tbody>\n' +
                            '    </table>\n' +
                            '  </div>' +
                            '</div>').insertAfter('#before');

                        document.getElementById('stderr').value = data['output'];
                        document.getElementById('stderr').style.color = 'red';
                    }
                    document.getElementById('over').innerHTML = status;
                    document.getElementById('center').innerHTML = data['time'] + 'ms';
                    document.getElementById('under').innerHTML = data['memory'] + 'KB';

                    $('#double').css('pointer-events','auto');

                }).fail(function(data){
                    var name = document.getElementById("load");
                    name.remove();

                    //通信失敗
                    document.getElementById('stderr').value = "どんまい";
                    $('#double').css('pointer-events','auto');
                })

            });
        </script>
    </div>
</div>

