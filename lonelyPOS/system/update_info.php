<?php require 'autoload.php';?>
<table class="table table-top-campaign" id="info_payment">
	<tbody>
		<tr>
			<td>Member</td>
			<td><?php
            if ($cart->getMember() != null) {
                $member = $cart->getMember();
                echo $member->getFname() . ' ' . $member->getLname();
            } else {
                echo 'Guest';
            }
            ?></td>
		</tr>
	</tbody>
</table>