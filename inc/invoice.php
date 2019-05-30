<?php
        session_start();
        require_once('main-functions.php');
userRequireLogin();

$book = getOptSingle('bookings','id',$_GET['BookID']);
?> 
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <?php echo getoptvalue('website_title'); ?>
                            </td>
                            
                            <td>
                                Invoice #: <?php echo $_GET['BookID']; ?><br>
                                Created: <?php echo $book['book_created_date']; ?><br>
                                <p>
                    <?php if($book['book_status'] == 'aproved'){
                        echo '<b style="background-color:green;padding:5px;color:white;">APROVED</b><b> => <a href="" class="btn btn-dark btn-sm">Pay</a></b>';
                    }elseif($book['book_status'] == 'disaproved'){
                        echo '<b style="background-color:red;padding:5px;">DISAPROVED</b>';
                    }elseif($book['book_status'] == 'pending'){
                        echo '<b style="background-color:yellow;padding:5px;">PENDING</b>';
                    }elseif($book['book_status'] == 'paid'){
                        echo '<b style="background-color:green;padding:5px;">PAID</b>';
                    } ?>
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <?php echo getoptvalue('website_title'); ?>.<br>
                                <?php echo getoptvalue('website_opt_address'); ?>
                            </td>
                            
                            <td>
                                <?php echo getoptvalue('website_title'); ?>.<br>
                                <?php echo getoptvalue('website_opt_email'); ?><br>
                                <?php echo getoptvalue('website_opt_phone'); ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Payment Method
                </td>
                
                <td>
                    Credit Card	 #
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    Credit Card
                </td>
                
                <td>
                    <?php echo $book['book_prices']; ?>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Item
                </td>
                
                <td>
                    Price
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    <?php echo displayOpt('events','id',$book['book_event_id'],'event_name'); ?> - Event
                </td>
                
                <td>
                    <?php echo $book['book_event_capacity']; ?> Persons <b>x</b> <?php echo $book['book_prices']/$book['book_event_capacity'].' '.getoptvalue('website_valute'); ?>
                </td>
            </tr>

            <tr class="total">
                <td></td>
                
                <td>
                   Total: <?php echo $book['book_prices'].' '.getoptvalue('website_valute'); ?>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>