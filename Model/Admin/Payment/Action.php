<?php
/**
 * Paybox Epayment module for Magento
 *
 * Feel free to contact Paybox by Verifone at support@paybox.com for any
 * question.
 *
 * LICENSE: This source file is subject to the version 3.0 of the Open
 * Software License (OSL-3.0) that is available through the world-wide-web
 * at the following URI: http://opensource.org/licenses/OSL-3.0. If
 * you did not receive a copy of the OSL-3.0 license and are unable
 * to obtain it through the web, please send a note to
 * support@paybox.com so we can mail you a copy immediately.
 *
 *
 * @version   1.0.0
 * @author    BM Services <contact@bm-services.com>
 * @copyright 2012-2017 Paybox
 * @license   http://opensource.org/licenses/OSL-3.0
 * @link      http://www.paybox.com/
 */

namespace Paybox\Epayment\Model\Admin\Payment;

class Action implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        $immediate = array(
            'value' => 'immediate',
            'label' => __('Paid Immediatly')
        );
        $deferred = array(
            'value' => 'deferred',
            'label' => __('Defered payment')
        );
        $manual = array(
            'value' => 'manual',
            'label' => __('Paid shipping')
        );

        $manager = \Magento\Framework\App\ObjectManager::getInstance();
        $config  = $manager->get('Paybox\Epayment\Model\Config');
        if ($config->getSubscription() != \Paybox\Epayment\Model\Config::SUBSCRIPTION_OFFER1) {
            $manual['disabled'] = 'disabled';
        }

        $out = [];
        $out[] = $immediate;
        $out[] = $deferred;
        $out[] = $manual;
        return $out;
    }
}
