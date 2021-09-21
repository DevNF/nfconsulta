<?php
namespace NFHub\Consulta;

use Exception;
use NFHub\Common\Tools as ToolsBase;
/**
 * Classe Tools
 *
 * Classe responsável pela implementação com a API de boletos do NFHub
 *
 * @category  NFHub
 * @package   NFHub\Consulta\Tools
 * @author    Diego Almeida <diego.feres82 at gmail dot com>
 * @copyright 2020 NFSERVICE
 * @license   https://opensource.org/licenses/MIT MIT
 */
class Tools extends ToolsBase
{
    /**
     * Função responsável por realizar uma consulta de CNPJ no NFHub
     *
     * @param string $cnpj CNPJ a ser consultado
     * @param array $params Parametros adicionais para a requisição
     *
     * @access public
     * @return array
     */
    public function consultaCnpj(string $cnpj, array $params = []) :array
    {
        try {
            $params = array_filter($params, function($item) {
                return $item['name'] !== 'cnpj';
            }, ARRAY_FILTER_USE_BOTH);

            $params[] = [
                'name' => 'cnpj',
                'value' => $cnpj
            ];

            $dados = $this->get('/cnpj', $params);

            if ($dados['httpCode'] == 200) {
                return $dados;
            }

            if (isset($dados['body']->errors)) {
                throw new \Exception(implode("\r\n", $dados['body']->errors), 1);
            }

            throw new Exception(json_encode($dados), 1);
        } catch (Exception $error) {
            throw new Exception($error, 1);
        }
    }

    /**
     * Função responsável por realizar uma consulta de CEP no NFHub
     *
     * @param string $cep CEP a ser consultado
     * @param array $params Parametros adicionais para a requisição
     *
     * @access public
     * @return array
     */
    public function consultaCep(string $cep, array $params = []): array
    {
        try {
            $params = array_filter($params, function($item) {
                return $item['name'] !== 'cep';
            }, ARRAY_FILTER_USE_BOTH);

            $params[] = [
                'name' => 'cep',
                'value' => $cep
            ];

            $dados = $this->get('/cep', $params);

            if ($dados['httpCode'] == 200) {
                return $dados;
            }

            if (isset($dados['body']->errors)) {
                throw new \Exception(implode("\r\n", $dados['body']->errors), 1);
            }

            throw new Exception(json_encode($dados), 1);
        } catch (Exception $error) {
            throw new Exception($error, 1);
        }
    }

    /**
     * Função responsável por realizar uma consulta de IP no NFHub
     *
     * @param string $ip IP a ser consultado
     * @param array $params Parametros adicionais para a requisição
     *
     * @access public
     * @return array
     */
    public function consultaIp(string $ip, array $params = []): array
    {
        try {
            $params = array_filter($params, function($item) {
                return $item['name'] !== 'ip';
            }, ARRAY_FILTER_USE_BOTH);

            $params[] = [
                'name' => 'ip',
                'value' => $ip
            ];

            $dados = $this->get('/ip', $params);

            if ($dados['httpCode'] == 200) {
                return $dados;
            }

            if (isset($dados['body']->errors)) {
                throw new \Exception(implode("\r\n", $dados['body']->errors), 1);
            }

            throw new Exception(json_encode($dados), 1);
        } catch (Exception $error) {
            throw new Exception($error, 1);
        }
    }
}
