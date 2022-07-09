/**
    関数： テキストエディタの生成
    引数： 作成する場所のid
    戻り値： Quillエディタの生成情報
**/
function quillEditor(make_id) {

    var toolbarOptions;
    var quill;
    var themes = set_themes();

    // ツールバー機能の設定
    toolbarOptions = [
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

    make_id = '#' + make_id;

    // エディタの情報を生成
    quill = new Quill(make_id, {
        modules: {
            toolbar: toolbarOptions
        },
        placeholder: '本文を入力してください',
        theme: themes
    });

    return quill;
}


// テーマ設定（PCとSPでテーマを切り替える）
function set_themes() {
    var themes;
    if (window.parent.screen.width > 750) {
        themes = "snow";
    } else {
        themes = "bubble";
    }
    return themes;
}