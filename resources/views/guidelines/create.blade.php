@extends('layouts.app')

@section('content')
        {!! Form::model($guideline, ['route' => 'guidelines.store']) !!}

        <div class="form-group mb-4">
            {!! Form::label('title', 'タイトル')!!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group mb-4">
            {!! Form::label('thumbnail', 'サムネイル') !!}
            {!! Form::file('thumbnail', null, ['class' => 'form-control-file']) !!}
        </div>

        <div id="editor" class="mb-4"></div>
        <input type="hidden" id="editor-input" name="content">
        <script>
            var editor = document.getElementById('editor');
            var editorInput = document.getElementById('editor-input');
            var toolbarOptions = [
                // 見出し
                [{
                    'header': [1, 2, 3, 4, false]
                }],
                // フォント種類
                [{
                    'font': []
                }],
                // 文字寄せ
                [{
                    'align': []
                }],
                // 太字、斜め、アンダーバー
                ['bold', 'italic', 'underline'],
                // 文字色
                [{
                        'color': []
                    },
                    // 文字背景色
                    {
                        'background': []
                    }
                ],
                // リスト
                [{
                        'list': 'ordered'
                    },
                    {
                        'list': 'bullet'
                    }
                ],
                // インデント
                [{
                    'indent': '-1'
                }, {
                    'indent': '+1'
                }],
                // 画像挿入
                ['image'],
                // 動画
                ['video'],
                // 数式
                ['formula'],
                // URLリンク
                ['link']
            ];
            
            var quill = new Quill('#editor', {
                placeholder: '',
                theme: 'snow',
                modules: {
                toolbar: toolbarOptions
              },
            });
            
            quill.on('text-change', function(delta, oldDelta, source) {
            var editorHtml = editor.querySelector('.ql-editor').innerHTML;
            editorInput.value = editorHtml;
            });
        </script>

        
        {!! Form::submit('一時保存', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
@endsection