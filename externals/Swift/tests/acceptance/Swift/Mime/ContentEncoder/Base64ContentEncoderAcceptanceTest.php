<?php

require_once 'Swift/Mime/ContentEncoder/Base64ContentEncoder.php';
require_once 'Swift/ByteStream/ArrayByteStream.php';

class Swift_Mime_ContentEncoder_Base64ContentEncoderAcceptanceTest
    extends UnitTestCase
{

    private $_samplesDir;
    private $_encoder;

    public function setUp()
    {
        $this->_samplesDir = realpath(dirname(__FILE__) . '/../../../../_samples/charsets');
        $this->_encoder = new Swift_Mime_ContentEncoder_Base64ContentEncoder();
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

                    $os = new Swift_ByteStream_ArrayByteStream();
                    $os->write($text);

                    $is = new Swift_ByteStream_ArrayByteStream();

                    $this->_encoder->encodeByteStream($os, $is);

                    $encoded = '';
                    while (FALSE !== $bytes = $is->read(8192)) {
                        $encoded .= $bytes;
                    }

                    $this->assertEqual(
                        base64_decode($encoded), $text,
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
