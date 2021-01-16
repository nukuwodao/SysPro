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
                        <a class="nav-link" id="problem-tab"  href="./problem" role="tab" aria-controls="profile" aria-selected="false">
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
                        <a class="nav-link active" id="codetest-tab" href="./code-test" role="tab" aria-controls="contact" aria-selected="true">
                            <i class="fas fa-file-alt"></i>コードテスト
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <x-codetest/>
    </section>
</x-app-layout>
