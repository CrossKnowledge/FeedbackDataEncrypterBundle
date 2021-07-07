<?php


namespace CrossKnowledge\FeedbackDataEncrypterBundle\Services;


class DataEncrypter
{
    /**
     * encrypt data in 128 bits
     *
     * @param array|string $data
     * @param string $key
     * @return string
     */
    public function encrypt($data, $key) {

         if (empty($data)) {
            return $data;
        }

        $data = json_encode($data);
        $crypted_text = mcrypt_encrypt(
            MCRYPT_RIJNDAEL_128,
            $key,
            $data,
            MCRYPT_MODE_ECB
        );

        return base64_encode($crypted_text);
    }

    /**
     * Decrypt 128 bits data
     *
     * @param string $data
     * @param string $key
     * @return mixed The decrypted value is returned, and can be a boolean, integer, float, string, array or object.
     */
    public function decrypt($data, $key) {
        $string = mcrypt_decrypt(
            MCRYPT_RIJNDAEL_128,
            $key,
            base64_decode($data),
            MCRYPT_MODE_ECB
        );

        // Use regex to remove control character to avoid fail on json_decode
        return json_decode(preg_replace('/[[:cntrl:]]/', '', $string), true);
    }
}