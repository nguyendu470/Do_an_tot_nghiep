<!DOCTYPE html>
<html lang="en">
<head>
    <title>Please wait...</title>
    <style type="text/css">
        body, html {
            width:100%;
            height:100%;
            margin:0;
            padding:0;
            position: relative;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        .loader {
            width: 100px;
            height: 100px;
            position: relative;
            margin:0 auto;
        }
        .loader .logo {
            width: 45%;
            position: absolute;
            left: 27.5%;
            top: 27.5%;
        }
        .table {
            display: table;
            width:100%;
            height:100%;
        }
        .table-cell {
            display: table-cell;
            vertical-align: middle;
        }
        .bounce1, .bounce2, .bounce3 {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background-color: #54AF58;
            opacity: 0.7;
            position: absolute;
            top: 0;
            left: 0;
            -webkit-animation: spreadout 2.7s infinite ease-in-out;
            animation: spreadout 2.7s infinite ease-in-out;
        }
        .bounce2 {
            -webkit-animation-delay: -0.9s;
            animation-delay: -0.9s;
        }
        .bounce3 {
            -webkit-animation-delay: -1.8s;
            animation-delay: -1.8s;
        }
        @-webkit-keyframes spreadout {
            0% {
                -webkit-transform: scale(0.3);
            }
            80% {
                -webkit-transform: scale(1);
            }
            100% {
                opacity: 0;
            }
        }
        @keyframes  spreadout {
            0% {
                -webkit-transform: scale(0.3);
                transform: scale(0.3);
            }
            80% {
                -webkit-transform: scale(1);
                transform: scale(1);
            }
            100% {
                opacity: 0;
            }
        }
    </style>
</head>
<body>
<div class="table">
    <div class="table-cell">
        <div class="loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
            <div class="logo"></div>
        </div>
    </div>
</div>

 <?php if (isset($component)) { $__componentOriginal8cb6d5888ec578a40576406e7cebf3c3a18ed735 = $component; } ?>
<?php $component = $__env->getContainer()->make(Tzsk\Payu\Components\Form::class, []); ?>
<?php $component->withName('payu-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal8cb6d5888ec578a40576406e7cebf3c3a18ed735)): ?>
<?php $component = $__componentOriginal8cb6d5888ec578a40576406e7cebf3c3a18ed735; ?>
<?php unset($__componentOriginal8cb6d5888ec578a40576406e7cebf3c3a18ed735); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
</body>
</html>
<?php /**PATH E:\Đồ_Án_Tốt_Nghiệp_NGUYENVANDU\resources\views/vendor/payu/form.blade.php ENDPATH**/ ?>