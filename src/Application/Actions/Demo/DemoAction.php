<?php
declare(strict_types=1);

namespace App\Application\Actions\Demo;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Application\Actions\Action;
use Psr\Log\LoggerInterface;



class DemoAction extends Action
{
    public $list = array('Ankit', 'Sanjeev', 'Keshav', 'Prathmesh');
    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger) {
        parent::__construct($logger);
    }

    /**
     * {@inheritdoc}
     */
    // @route     GET /members
    // @desc      Get members list
    // @access    Public
    protected function action(): Response
    {    
        $res = json_encode(array("Members" => $this->list));
        $this->response->getBody()->write($res);
        return $this->response;
    }

    // @route     POST /addmember
    // @desc      Add member to demo list
    // @access    Public
    public function addMember(Request $request, Response $response, array $args){
        $params = $request->getParsedBody();
        if(!array_key_exists('newmember', $params)){
            $res = json_encode(array("errors"=> array("New Member is required!!!")));
            $response->getBody()->write($res, 400);
            return $response->withStatus(400);
        }        

        $newmember = $params['newmember'];
        array_push($this->list, $newmember);

        $res = json_encode(array("Members" => $this->list));
        $response->getBody()->write($res);
        return $response;
    }
}
