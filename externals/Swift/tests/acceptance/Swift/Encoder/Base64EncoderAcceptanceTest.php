<?php

require_once 'Swift/Encoder/Base64Encoder.php';

class Swift_Encoder_Base64EncoderAcceptanceTest extends UnitTestCase
{

    private $_samplesDir;
    private $_encoder;

    public function setUp()
    {
        $this->_samplesDir = realpath(dirname(__FILE__) . '/../../../_samples/charsets');
        $this->_encoder = new Swift_Encoder_Base64Encoder();
    }

    public function testEncodingAndDecodingSamples()
    {
        $sampleFp = opendir($this->_samplesDir);
        while (FALSE !== $encodingDir = readdir($sampleFp)) {
            if (substr($encodingDir, 0, 1) == '.') {
                continue;
            }

            $sampleDir = $this->_samplesDir . '/' . $encodingDir;

            if (is_dir($sampleDir)) {

                $fileFp = opendir($sampleDir);
                while (FALSE !== $sampleFile = readdir($fileFp)) {
                    if (substr($sampleFile, 0, 1) == '.') {
                        continue;
                    }

                    $text = file_get_contents($sampleDir . '/' . $sampleFile);
                    $encodedText = $this->_encoder->encodeString($text);

                    $this->assertEqual(
                        base64_decode($encodedText), $text,
                        '%s: Encoded string should decode back to original string for sample ' .
                            $sampleDir . '/' . $sampleFile
                    );
                }
                closedir($fileFp);
            }

        }
        closedir($sampleFp);
    }

}
