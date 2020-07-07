<?php

use system\dev\controller\errorsExec;
?>
    <html>

    <head>
        <title>
            <?=errorsExec::display_error($Error['Type'])?>
        </title>

        <style>
            body {
                padding: 0;
                margin: 0;
                overflow: hidden;
            }

            .body_wrapper {
                position: fixed;
                left: 0;
                top: 0;
                bottom: 0;
                right: 0;
                background: #fff;
                z-index: 9999999999999999999999999999999999999999999999999999999999999999999;
            }

            .error_nav {
                position: fixed;
                left: 0;
                right: 0;
                top: 0;
                height: 75px;
                background: #ffffff;
                box-shadow: 1px 1px 12px #d0d0d0;
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding-right: 20px;
            }

            .error-brand-widget {
                display: flex;
                flex-direction: row;
                align-items: center;
                width: 300px;
            }

            .error_logo img {
                width: 73px;
            }

            .error_code {
                color: #000;
            }

            .error_body {
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .error-widget {
                width: 700px;
                height: 250px;
                background: #f1f1f1;
                border-bottom-left-radius: 22px;
                border-bottom-right-radius: 22px;
                padding-top: 110px;
                padding-left: 15px;
                padding-right: 15px;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                box-shadow: 0px 2px 1px #e0e0e0;
            }

            .error-dir {
                height: 100px;
                border-top: 4px solid #08565c;
                color: #4d4d4d;
                padding-top: 11px;
            }

            .error-message {
                color: #000000;
                font-size: 20px;
            }
        </style>
    </head>

    <body>
        <div class='body_wrapper'>
            <nav class='error_nav'>
                <div class='error-brand-widget'>
                    <span class='error_logo'>
                    <img src='/assets/images/wecodefy.png' alt=''>
                </span>
                    <span class='error_type'><?=errorsExec::display_error($Error['Type'])?></span>
                </div>
                <div class='error_code'>Code:
                    <?=errorsExec::display_error($Error['Code'])?>
                </div>
            </nav>
            <div class='error_body'>
                <div class='error-widget'>
                    <div class='error-message'>
                        <?=errorsExec::display_error($Error['Message'])?>
                    </div>
                    <div class='error-dir'>Directory:
                        <?=errorsExec::display_error($Error['Dir'])?>
                    </div>
                </div>
            </div>

        </div>
    </body>

    </html>