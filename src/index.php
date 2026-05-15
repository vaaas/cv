<?php
$favicon =
    "data:image/png;base64," .
    base64_encode(file_get_contents(__DIR__ . "/../assets/favicon.png")); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Vasileios Pasialiokis — Full-stack Engineer</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="CV of Vasileios Pasialiokis, senior full-stack engineer.">
        <link rel="icon" href="<?= $favicon ?>">
        <style><?php require __DIR__ . "/style.php"; ?></style>
    </head>
    <body>
        <header>
            <hgroup>
                <h1>Vasileios Pasialiokis</h1>
                <p>full-stack engineer · en/gr</p>
            </hgroup>
            <address>
                <a href="mailto:vas@tsuku.ro">vas@tsuku.ro</a>
                <a href="tel:+306955018104">+30 695 501 8104</a>
                <a href="https://github.com/vaaas">github.com/vaaas</a>
            </address>
        </header>

        <section>
            <h2>Experience.</h2>
            <ol>
                <li>
                    <h3>
                        <strong>Postquant Labs</strong>
                        <span>Senior Full-stack Engineer</span>
                        <time>2026 — Now</time>
                    </h3>
                    <ul>
                        <li>Leading web3 integrations with EVM smart contracts and post-quantum cryptography.</li>
                        <li>Adopted agentic development workflows end-to-end, cutting feature lead time by 70% (weeks to days).</li>
                        <li>Built typed, composable RxJS pipelines over heterogeneous event streams, eliminating race conditions.</li>
                        <li>Achieved 85% integration test coverage, enabling safe refactors and reducing regressions.</li>
                        <li>Partnered with Product and Marketing on pixel-perfect, animated experiences.</li>
                        <li>Shipping across 5 projects with full-stack React and TypeScript.</li>
                    </ul>
                </li>
                <li>
                    <h3>
                        <strong>Kaizen Gaming</strong>
                        <span>Senior Software Engineer</span>
                        <time>2024 — 2026</time>
                    </h3>
                    <ul>
                        <li>Senior engineer on the Live Betting team, serving 2M+ daily active users across 15+ markets.</li>
                        <li>Built frontend systems with Vue 3, Vuex, Tailwind, and SignalR, processing realtime market updates.</li>
                        <li>Architected a composable, functional rendering pipeline, cutting re-render time to milliseconds.</li>
                        <li>Drove a 22% lift in player conversion and 35% reduction in time-to-bet through targeted UX work.</li>
                        <li>Led cross-team architectural initiatives and mentored junior and mid-level engineers.</li>
                    </ul>
                </li>
                <li>
                    <h3>
                        <strong>Aylo</strong>
                        <span>Backend Developer</span>
                        <time>2023 — 2024</time>
                    </h3>
                    <ul>
                        <li>Modernized a 15-year-old Zend Framework 1 monolith, migrating to Laravel-based microservices.</li>
                        <li>Enhanced content search with Elasticsearch, improving query latency and accuracy.</li>
                        <li>Delivered PHP/Laravel/MySQL backend services serving hundreds of thousands of users.</li>
                    </ul>
                </li>
                <li>
                    <h3>
                        <strong>Phenometry</strong>
                        <span>Full-stack Developer</span>
                        <time>2022 — 2023</time>
                    </h3>
                    <ul>
                        <li>Full-stack engineer for Phi, a reactive, cross-platform 3D CAD web platform integrating with OnShape.</li>
                        <li>Stack: Node.js, Express, TypeScript, Vue, PostgreSQL, three.js — from schema to WebGL rendering.</li>
                        <li>Drove test coverage from 0% to 80%, introduced strict TypeScript, and built CI/CD pipelines.</li>
                        <li>Reduced JS bundle size (20MB → 1.9MB), delivering sub-second Time to Interactive.</li>
                        <li>Shipped a visual refresh, tablet/pen interaction layer, and Stripe billing integration.</li>
                    </ul>
                </li>
                <li>
                    <h3>
                        <strong>Doppler SA</strong>
                        <span>Full-stack Developer</span>
                        <time>2020 — 2022</time>
                    </h3>
                    <ul>
                        <li>Full-stack development in PHP, Laravel, Lumen, Vue, SQL Server, and MariaDB.</li>
                        <li>Architected CI/CD pipelines on GitLab and Docker, reducing deployment time by 80%.</li>
                        <li>Delivered order-automation tooling and BI dashboards, saving an estimated 20 staff-hours per week.</li>
                        <li>Built BI dashboards and ERP extensions adopted across departments.</li>
                        <li>Mentored new employees in modern web development.</li>
                    </ul>
                </li>
            </ol>
        </section>

        <section>
            <h2>Open-source Contributions.</h2>
            <ol>
                <li>
                    <h3>
                        <strong>Mattermost</strong>
                        <time>2022</time>
                    </h3>
                    <ul>
                        <li>Sponsored open-source contributor to the Electron desktop application, resolving Linux-specific bugs.</li>
                    </ul>
                </li>
                <li>
                    <h3>
                        <strong>Organisation for Transformative Works</strong>
                        <time>2015 — 2021</time>
                    </h3>
                    <ul>
                        <li>Founded and coordinated the Greek translation team, growing it to 4 volunteers and delivering hundreds of thousands of translated words.</li>
                        <li>Managed content workflows in WordPress and built internal tooling in jQuery.</li>
                    </ul>
                </li>
            </ol>
        </section>

        <section>
            <dl>
                <div>
                    <dt>Languages</dt>
                    <dd>
                        <ul>
                            <li>TypeScript</li>
                            <li>JavaScript</li>
                            <li>PHP</li>
                            <li>Python</li>
                            <li>SQL</li>
                            <li>C</li>
                            <li>bash</li>
                            <li>HTML</li>
                            <li>CSS</li>
                            <li>SCSS</li>
                        </ul>
                    </dd>
                </div>
                <div>
                    <dt>Frontend &amp; libraries</dt>
                    <dd>
                        <ul>
                            <li>React</li>
                            <li>Vue.js</li>
                            <li>Nuxt.js</li>
                            <li>Vuex</li>
                            <li>Tailwind CSS</li>
                            <li>RxJS</li>
                            <li>Jest</li>
                            <li>Vitest</li>
                            <li>bun:test</li>
                            <li>Zustand</li>
                        </ul>
                    </dd>
                </div>
                <div>
                    <dt>Backend &amp; infra</dt>
                    <dd>
                        <ul>
                            <li>Node.js</li>
                            <li>Laravel</li>
                            <li>PostgreSQL</li>
                            <li>Netlify</li>
                            <li>WebSockets</li>
                            <li>Docker</li>
                            <li>AWS</li>
                            <li>Web3</li>
                            <li>Git</li>
                            <li>PHPUnit</li>
                        </ul>
                    </dd>
                </div>
            </dl>
        </section>

        <footer>
            <a href="en.pdf" data-media="screen">This document is available in PDF</a>
            <a href="https://rirekisho.tsuku.ro" data-media="print">This document is available online at rirekisho.tsuku.ro</a>
            <aside>Page 1/1</aside>
        </footer>
    </body>
</html>
