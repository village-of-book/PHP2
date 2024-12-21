# 失敗アプリ
## プロダクトの紹介
- ２つのPHPで構成されている。（failure_index.phpとfailure_create.php）
- failure_index.phpには、2つの機能がある。（入力、入力後のデータ読み込み）
- failure_create.phpは、failure_index.phpから受け取ったデータをmemoテーブルに格納する。
## 工夫した点、こだわった点
- 一つの画面で入力と読み込みの２つの機能を実装した。
- 読み込みデータは、新しいものから順に並べた。
## 苦戦した点、共有したいハマりポイント
- 検索ページを作成していたが、難しかった。
- 検索ページHTMLフォームの値で、検索をしたかったが上手くいかなかった。
- https://qiita.com/progterry/items/6221d886a4f8e7a5ecd7
- あいまい検索のコードの書き方を参考にした。
- $sql = 'SELECT * FROM `memo` WHERE title LIKE "%' . $_POST["read_title"] . '%"';