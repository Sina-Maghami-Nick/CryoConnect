<?php

namespace App\Controllers;

use CryoConnectDB\CryosphereWhatQuery;
use CryoConnectDB\CryosphereWhatSpeceficQuery;
use CryoConnectDB\CryosphereWhenQuery;
use CryoConnectDB\ExpertCryosphereWhenQuery;
use CryoConnectDB\CryosphereMethodsQuery;
use CryoConnectDB\ExpertsQuery;
use CryoConnectDB\ExpertCryosphereWhatQuery;
use CryoConnectDB\ExpertCryosphereWhatSpeceficQuery;
use CryoConnectDB\ExpertCryosphereMethodsQuery;

class DataController extends Controller {

    /**
     * Approving Expert What
     */
    public function addCryosphereWhatAction($request, $response, $args) {
        $data = $request->getParsedBody();


        $expertId = trim(strtolower(filter_var($data['id'], FILTER_SANITIZE_NUMBER_INT)));
        $cryosphereWhatId = filter_var($data['dataId'], FILTER_SANITIZE_NUMBER_INT);
        $cryosphereWhatName = filter_var($data['dataValue'], FILTER_SANITIZE_STRING);
        $expert = ExpertsQuery::create()->findOneById($expertId);

        $cryoshphereWhat = CryosphereWhatQuery::create()->filterByApproved(false)->findOneById($cryosphereWhatId);
        if (!empty($cryoshphereWhat)) {
            $expertCryoshphereWhat = ExpertCryosphereWhatQuery::create()->filterByExpertId($expertId)->findOneByCryosphereWhatId($cryoshphereWhat->getId());
        }
        //rest of validations
        if (
                empty($expertCryoshphereWhat) ||
                empty($expert) ||
                $cryoshphereWhat->getCryosphereWhatName() != $cryosphereWhatName
        ) {
            $this->container->get('logger')
                    ->addError('Wrong data recieved from ExpertWhat approval call: ' . json_encode($data));

            return $response->withStatus(400);
        }

        $cryoshphereWhat->setApproved(true);
        $cryoshphereWhat->save();

        return $response->withStatus(200);
    }

    /**
     * Editing and Approving Expert What
     */
    public function updateCryosphereWhatAction($request, $response, $args) {
        $data = $request->getParsedBody();

        $expertId = trim(strtolower(filter_var($data['id'], FILTER_SANITIZE_NUMBER_INT)));
        $cryosphereWhatId = filter_var($data['dataId'], FILTER_SANITIZE_NUMBER_INT);
        $newCryosphereWhatName = trim(filter_var($data['newDataValue'], FILTER_SANITIZE_STRING));
        $cryosphereWhatName = filter_var($data['dataValue'], FILTER_SANITIZE_STRING);
        $matchingCryoshphereWhatId = trim(filter_var($data['existingdataid'], FILTER_SANITIZE_NUMBER_INT));

        $expert = ExpertsQuery::create()->findOneById($expertId);

        $cryoshphereWhat = CryosphereWhatQuery::create()->filterByApproved(false)->findOneById($cryosphereWhatId);
        $expertCryoshphereWhat = ExpertCryosphereWhatQuery::create()->filterByExpertId($expertId)->findOneByCryosphereWhatId($cryoshphereWhat->getId());
        $matchingCryoshphereWhat = CryosphereWhatQuery::create()->filterByApproved(true)->findOneById($matchingCryoshphereWhatId);

        //rest of validations
        if (
                empty($expertCryoshphereWhat) ||
                (
                empty($newCryosphereWhatName) &&
                (
                empty($matchingCryoshphereWhatId) ||
                !empty(ExpertCryosphereWhatQuery::create()->filterByExpertId($expertId)->findOneByCryosphereWhatId($matchingCryoshphereWhatId))
                )
                ) ||
                empty($expert) ||
                empty($cryoshphereWhat) ||
                $cryoshphereWhat->getCryosphereWhatName() != $cryosphereWhatName
        ) {
            $this->container->get('logger')
                    ->addError('Wrong data recieved from ExpertWhat update call: ' . json_encode($data));
            $response->getBody()->write($newCryosphereWhatName);

            return $response->withStatus(400);
        }

        if (!empty($newCryosphereWhatName)) {
            $cryoshphereWhat->setCryosphereWhatName($newCryosphereWhatName);
            $cryoshphereWhat->setApproved(true);
            $cryoshphereWhat->save();
            $this->container->get('logger')
                    ->addInfo('CryosphereWhat: ' . $cryoshphereWhat->getCryosphereWhatName() . ' has been changed to :' . $newCryosphereWhatName . ' and approved');
        } else {
            $cryoshphereWhat->delete();
            $expert->addCryosphereWhat($matchingCryoshphereWhat);
            $expert->save();
            $this->container->get('logger')
                    ->addInfo('CryosphereWhat: ' . $cryosphereWhatName . ' has been removed');
            $this->container->get('logger')
                    ->addInfo('CryosphereWhat: ' . $matchingCryoshphereWhat->getCryosphereWhatName() . ' has been assigned to expertId: ' . $expert->getId());
        }

        return $response->withStatus(200);
    }

    /**
     *  Remove Expert What
     */
    public function removeCryosphereWhatAction($request, $response, $args) {
        $data = $request->getParsedBody();

        $expertId = trim(strtolower(filter_var($data['id'], FILTER_SANITIZE_NUMBER_INT)));
        $cryosphereWhatId = filter_var($data['dataId'], FILTER_SANITIZE_NUMBER_INT);
        $cryosphereWhatName = filter_var($data['dataValue'], FILTER_SANITIZE_STRING);
        $expert = ExpertsQuery::create()->findOneById($expertId);

        $cryoshphereWhat = CryosphereWhatQuery::create()->filterByApproved(false)->findOneById($cryosphereWhatId);
        if (!empty($cryoshphereWhat)) {
            $expertCryoshphereWhat = ExpertCryosphereWhatQuery::create()->filterByExpertId($expertId)->findOneByCryosphereWhatId($cryoshphereWhat->getId());
        }
        //rest of validations
        if (
                empty($expertCryoshphereWhat) ||
                empty($expert) ||
                $cryoshphereWhat->getCryosphereWhatName() != $cryosphereWhatName
        ) {
            $this->container->get('logger')
                    ->addError('Wrong data recieved from ExpertWhat delete call: ' . json_encode($data));

            return $response->withStatus(400);
        }
        $cryoshphereWhat->delete();

        $this->container->get('logger')
                ->addInfo('CryosphereWhat: ' . $cryosphereWhatName . ' has been removed');

        return $response->withStatus(200);
    }

    /**
     * Approving Expert WhatSpecefic
     */
    public function addCryosphereWhatSpeceficAction($request, $response, $args) {
        $data = $request->getParsedBody();


        $expertId = trim(strtolower(filter_var($data['id'], FILTER_SANITIZE_NUMBER_INT)));
        $cryosphereWhatSpeceficId = filter_var($data['dataId'], FILTER_SANITIZE_NUMBER_INT);
        $cryosphereWhatSpeceficName = filter_var($data['dataValue'], FILTER_SANITIZE_STRING);
        $expert = ExpertsQuery::create()->findOneById($expertId);

        $cryoshphereWhatSpecefic = CryosphereWhatSpeceficQuery::create()->filterByApproved(false)->findOneById($cryosphereWhatSpeceficId);
        if (!empty($cryoshphereWhatSpecefic)) {
            $expertCryoshphereWhatSpecefic = ExpertCryosphereWhatSpeceficQuery::create()->filterByExpertId($expertId)->findOneByCryosphereWhatSpeceficId($cryoshphereWhatSpecefic->getId());
        }
        //rest of validations
        if (
                empty($expertCryoshphereWhatSpecefic) ||
                empty($expert) ||
                $cryoshphereWhatSpecefic->getCryosphereWhatSpeceficName() != $cryosphereWhatSpeceficName
        ) {
            $this->container->get('logger')
                    ->addError('Wrong data recieved from ExpertWhatSpecefic approval call: ' . json_encode($data));

            return $response->withStatus(400);
        }

        $cryoshphereWhatSpecefic->setApproved(true);
        $cryoshphereWhatSpecefic->save();

        $response->withStatus(200);

        return $response->withStatus(200);
    }

    /**
     * Editing and Approving Expert WhatSpecefic
     */
    public function updateCryosphereWhatSpeceficAction($request, $response, $args) {
        $data = $request->getParsedBody();

        $expertId = trim(strtolower(filter_var($data['id'], FILTER_SANITIZE_NUMBER_INT)));
        $cryosphereWhatSpeceficId = filter_var($data['dataId'], FILTER_SANITIZE_NUMBER_INT);
        $newCryosphereWhatSpeceficName = trim(filter_var($data['newDataValue'], FILTER_SANITIZE_STRING));
        $cryosphereWhatSpeceficName = filter_var($data['dataValue'], FILTER_SANITIZE_STRING);
        $matchingCryoshphereWhatSpeceficId = trim(filter_var($data['existingdataid'], FILTER_SANITIZE_NUMBER_INT));

        $expert = ExpertsQuery::create()->findOneById($expertId);

        $cryoshphereWhatSpecefic = CryosphereWhatSpeceficQuery::create()->filterByApproved(false)->findOneById($cryosphereWhatSpeceficId);
        $expertCryoshphereWhatSpecefic = ExpertCryosphereWhatSpeceficQuery::create()->filterByExpertId($expertId)->findOneByCryosphereWhatSpeceficId($cryoshphereWhatSpecefic->getId());
        $matchingCryoshphereWhatSpecefic = CryosphereWhatSpeceficQuery::create()->filterByApproved(true)->findOneById($matchingCryoshphereWhatSpeceficId);

        //rest of validations
        if (
                empty($expertCryoshphereWhatSpecefic) ||
                (
                empty($newCryosphereWhatSpeceficName) &&
                (
                empty($matchingCryoshphereWhatSpeceficId) ||
                !empty(ExpertCryosphereWhatSpeceficQuery::create()->filterByExpertId($expertId)->findOneByCryosphereWhatSpeceficId($matchingCryoshphereWhatSpeceficId))
                )
                ) ||
                empty($expert) ||
                empty($cryoshphereWhatSpecefic) ||
                $cryoshphereWhatSpecefic->getCryosphereWhatSpeceficName() != $cryosphereWhatSpeceficName
        ) {
            $this->container->get('logger')
                    ->addError('Wrong data recieved from ExpertWhatSpecefic update call: ' . json_encode($data));
            $response->getBody()->write($newCryosphereWhatSpeceficName);

            return $response->withStatus(400);
        }

        if (!empty($newCryosphereWhatSpeceficName)) {
            $cryoshphereWhatSpecefic->setCryosphereWhatSpeceficName($newCryosphereWhatSpeceficName);
            $cryoshphereWhatSpecefic->setApproved(true);
            $cryoshphereWhatSpecefic->save();
            $this->container->get('logger')
                    ->addInfo('CryosphereWhatSpecefic: ' . $cryoshphereWhatSpecefic->getCryosphereWhatSpeceficName() . ' has been changed to :' . $newCryosphereWhatSpeceficName . ' and approved');
        } else {
            $cryoshphereWhatSpecefic->delete();
            $expert->addCryosphereWhatSpecefic($matchingCryoshphereWhatSpecefic);
            $expert->save();
            $this->container->get('logger')
                    ->addInfo('CryosphereWhatSpecefic: ' . $cryosphereWhatSpeceficName . ' has been removed');
            $this->container->get('logger')
                    ->addInfo('CryosphereWhatSpecefic: ' . $matchingCryoshphereWhatSpecefic->getCryosphereWhatSpeceficName() . ' has been assigned to expertId: ' . $expert->getId());
        }

        return $response->withStatus(200);
    }

    /**
     *  Remove Expert WhatSpecefic
     */
    public function removeCryosphereWhatSpeceficAction($request, $response, $args) {
        $data = $request->getParsedBody();

        $expertId = trim(strtolower(filter_var($data['id'], FILTER_SANITIZE_NUMBER_INT)));
        $cryosphereWhatSpeceficId = filter_var($data['dataId'], FILTER_SANITIZE_NUMBER_INT);
        $cryosphereWhatSpeceficName = filter_var($data['dataValue'], FILTER_SANITIZE_STRING);
        $expert = ExpertsQuery::create()->findOneById($expertId);

        $cryoshphereWhatSpecefic = CryosphereWhatSpeceficQuery::create()->filterByApproved(false)->findOneById($cryosphereWhatSpeceficId);
        if (!empty($cryoshphereWhatSpecefic)) {
            $expertCryoshphereWhatSpecefic = ExpertCryosphereWhatSpeceficQuery::create()->filterByExpertId($expertId)->findOneByCryosphereWhatSpeceficId($cryoshphereWhatSpecefic->getId());
        }
        //rest of validations
        if (
                empty($expertCryoshphereWhatSpecefic) ||
                empty($expert) ||
                $cryoshphereWhatSpecefic->getCryosphereWhatSpeceficName() != $cryosphereWhatSpeceficName
        ) {
            $this->container->get('logger')
                    ->addError('Wrong data recieved from ExpertWhatSpecefic delete call: ' . json_encode($data));

            return $response->withStatus(400);
        }
        $cryoshphereWhatSpecefic->delete();

        $this->container->get('logger')
                ->addInfo('CryosphereWhatSpecefic: ' . $cryosphereWhatSpeceficName . ' has been removed');

        return $response->withStatus(200);
    }

    /**
     * Approving Expert When
     */
    public function addCryosphereWhenAction($request, $response, $args) {
        $data = $request->getParsedBody();


        $expertId = trim(strtolower(filter_var($data['id'], FILTER_SANITIZE_NUMBER_INT)));
        $cryosphereWhenId = filter_var($data['dataId'], FILTER_SANITIZE_NUMBER_INT);
        $cryosphereWhenName = filter_var($data['dataValue'], FILTER_SANITIZE_STRING);
        $expert = ExpertsQuery::create()->findOneById($expertId);

        $cryoshphereWhen = CryosphereWhenQuery::create()->filterByApproved(false)->findOneById($cryosphereWhenId);
        if (!empty($cryoshphereWhen)) {
            $expertCryoshphereWhen = ExpertCryosphereWhenQuery::create()->filterByExpertId($expertId)->findOneByCryosphereWhenId($cryoshphereWhen->getId());
        }
        //rest of validations
        if (
                empty($expertCryoshphereWhen) ||
                empty($expert) ||
                $cryoshphereWhen->getCryosphereWhenName() != $cryosphereWhenName
        ) {
            $this->container->get('logger')
                    ->addError('Wrong data recieved from ExpertWhen approval call: ' . json_encode($data));

            return $response->withStatus(400);
        }

        $cryoshphereWhen->setApproved(true);
        $cryoshphereWhen->save();

        $response->withStatus(200);

        return $response->withStatus(200);
    }

    /**
     * Editing and Approving Expert When
     */
    public function updateCryosphereWhenAction($request, $response, $args) {
        $data = $request->getParsedBody();

        $expertId = trim(strtolower(filter_var($data['id'], FILTER_SANITIZE_NUMBER_INT)));
        $cryosphereWhenId = filter_var($data['dataId'], FILTER_SANITIZE_NUMBER_INT);
        $newCryosphereWhenName = trim(filter_var($data['newDataValue'], FILTER_SANITIZE_STRING));
        $cryosphereWhenName = filter_var($data['dataValue'], FILTER_SANITIZE_STRING);
        $matchingCryoshphereWhenId = trim(filter_var($data['existingdataid'], FILTER_SANITIZE_NUMBER_INT));

        $expert = ExpertsQuery::create()->findOneById($expertId);

        $cryoshphereWhen = CryosphereWhenQuery::create()->filterByApproved(false)->findOneById($cryosphereWhenId);
        $expertCryoshphereWhen = ExpertCryosphereWhenQuery::create()->filterByExpertId($expertId)->findOneByCryosphereWhenId($cryoshphereWhen->getId());
        $matchingCryoshphereWhen = CryosphereWhenQuery::create()->filterByApproved(true)->findOneById($matchingCryoshphereWhenId);

        //rest of validations
        if (
                empty($expertCryoshphereWhen) ||
                (
                empty($newCryosphereWhenName) &&
                (
                empty($matchingCryoshphereWhenId) ||
                !empty(ExpertCryosphereWhenQuery::create()->filterByExpertId($expertId)->findOneByCryosphereWhenId($matchingCryoshphereWhenId))
                )
                ) ||
                empty($expert) ||
                empty($cryoshphereWhen) ||
                $cryoshphereWhen->getCryosphereWhenName() != $cryosphereWhenName
        ) {
            $this->container->get('logger')
                    ->addError('Wrong data recieved from ExpertWhen update call: ' . json_encode($data));
            $response->getBody()->write($newCryosphereWhenName);
            return $response->withStatus(400);
        }

        if (!empty($newCryosphereWhenName)) {
            $cryoshphereWhen->setCryosphereWhenName($newCryosphereWhenName);
            $cryoshphereWhen->setApproved(true);
            $cryoshphereWhen->save();
            $this->container->get('logger')
                    ->addInfo('CryosphereWhen: ' . $cryoshphereWhen->getCryosphereWhenName() . ' has been changed to :' . $newCryosphereWhenName . ' and approved');
        } else {
            $cryoshphereWhen->delete();
            $expert->addCryosphereWhen($matchingCryoshphereWhen);
            $expert->save();
            $this->container->get('logger')
                    ->addInfo('CryosphereWhen: ' . $cryosphereWhenName . ' has been removed');
            $this->container->get('logger')
                    ->addInfo('CryosphereWhen: ' . $matchingCryoshphereWhen->getCryosphereWhenName() . ' has been assigned to expertId: ' . $expert->getId());
        }

        return $response->withStatus(200);
    }

    /**
     *  Remove Expert When
     */
    public function removeCryosphereWhenAction($request, $response, $args) {
        $data = $request->getParsedBody();

        $expertId = trim(strtolower(filter_var($data['id'], FILTER_SANITIZE_NUMBER_INT)));
        $cryosphereWhenId = filter_var($data['dataId'], FILTER_SANITIZE_NUMBER_INT);
        $cryosphereWhenName = filter_var($data['dataValue'], FILTER_SANITIZE_STRING);
        $expert = ExpertsQuery::create()->findOneById($expertId);

        $cryoshphereWhen = CryosphereWhenQuery::create()->filterByApproved(false)->findOneById($cryosphereWhenId);
        if (!empty($cryoshphereWhen)) {
            $expertCryoshphereWhen = ExpertCryosphereWhenQuery::create()->filterByExpertId($expertId)->findOneByCryosphereWhenId($cryoshphereWhen->getId());
        }
        //rest of validations
        if (
                empty($expertCryoshphereWhen) ||
                empty($expert) ||
                $cryoshphereWhen->getCryosphereWhenName() != $cryosphereWhenName
        ) {
            $this->container->get('logger')
                    ->addError('Wrong data recieved from ExpertWhen delete call: ' . json_encode($data));

            return $response->withStatus(400);
        }
        $cryoshphereWhen->delete();

        $this->container->get('logger')
                ->addInfo('CryosphereWhen: ' . $cryosphereWhenName . ' has been removed');

        return $response->withStatus(200);
    }

    /**
     * Approving Expert Methods
     */
    public function addCryosphereMethodsAction($request, $response, $args) {
        $data = $request->getParsedBody();


        $expertId = trim(strtolower(filter_var($data['id'], FILTER_SANITIZE_NUMBER_INT)));
        $cryosphereMethodsId = filter_var($data['dataId'], FILTER_SANITIZE_NUMBER_INT);
        $cryosphereMethodsName = filter_var($data['dataValue'], FILTER_SANITIZE_STRING);
        $expert = ExpertsQuery::create()->findOneById($expertId);

        $cryoshphereMethods = CryosphereMethodsQuery::create()->filterByApproved(false)->findOneById($cryosphereMethodsId);
        if (!empty($cryoshphereMethods)) {
            $expertCryoshphereMethods = ExpertCryosphereMethodsQuery::create()->filterByExpertId($expertId)->findOneByMethodId($cryoshphereMethods->getId());
        }
        //rest of validations
        if (
                empty($expertCryoshphereMethods) ||
                empty($expert) ||
                $cryoshphereMethods->getCryosphereMethodsName() != $cryosphereMethodsName
        ) {
            $this->container->get('logger')
                    ->addError('Wrong data recieved from ExpertMethods approval call: ' . json_encode($data));

            return $response->withStatus(400);
        }

        $cryoshphereMethods->setApproved(true);
        $cryoshphereMethods->save();

        $response->withStatus(200);

        return $response->withStatus(200);
    }

    /**
     * Editing and Approving Expert Methods
     */
    public function updateCryosphereMethodsAction($request, $response, $args) {
        $data = $request->getParsedBody();

        $expertId = trim(strtolower(filter_var($data['id'], FILTER_SANITIZE_NUMBER_INT)));
        $cryosphereMethodsId = filter_var($data['dataId'], FILTER_SANITIZE_NUMBER_INT);
        $newCryosphereMethodsName = trim(filter_var($data['newDataValue'], FILTER_SANITIZE_STRING));
        $cryosphereMethodsName = filter_var($data['dataValue'], FILTER_SANITIZE_STRING);
        $matchingCryoshphereMethodsId = trim(filter_var($data['existingdataid'], FILTER_SANITIZE_NUMBER_INT));

        $expert = ExpertsQuery::create()->findOneById($expertId);

        $cryoshphereMethods = CryosphereMethodsQuery::create()->filterByApproved(false)->findOneById($cryosphereMethodsId);
        $expertCryoshphereMethods = ExpertCryosphereMethodsQuery::create()->filterByExpertId($expertId)->findOneByMethodId($cryoshphereMethods->getId());
        $matchingCryoshphereMethods = CryosphereMethodsQuery::create()->filterByApproved(true)->findOneById($matchingCryoshphereMethodsId);

        //rest of validations
        if (
                empty($expertCryoshphereMethods) ||
                (
                empty($newCryosphereMethodsName) &&
                (
                empty($matchingCryoshphereMethodsId) ||
                !empty(ExpertCryosphereMethodsQuery::create()->filterByExpertId($expertId)->findOneByMethodId($matchingCryoshphereMethodsId))
                )
                ) ||
                empty($expert) ||
                empty($cryoshphereMethods) ||
                $cryoshphereMethods->getCryosphereMethodsName() != $cryosphereMethodsName
        ) {
            $this->container->get('logger')
                    ->addError('Wrong data recieved from ExpertMethods update call: ' . json_encode($data));
            $response->getBody()->write($newCryosphereMethodsName);
            return $response->withStatus(400);
        }

        if (!empty($newCryosphereMethodsName)) {
            $cryoshphereMethods->setCryosphereMethodsName($newCryosphereMethodsName);
            $cryoshphereMethods->setApproved(true);
            $cryoshphereMethods->save();
            $this->container->get('logger')
                    ->addInfo('CryosphereMethods: ' . $cryoshphereMethods->getCryosphereMethodsName() . ' has been changed to :' . $newCryosphereMethodsName . ' and approved');
        } else {
            $cryoshphereMethods->delete();
            $expert->addCryosphereMethods($matchingCryoshphereMethods);
            $expert->save();
            $this->container->get('logger')
                    ->addInfo('CryosphereMethods: ' . $cryosphereMethodsName . ' has been removed');
            $this->container->get('logger')
                    ->addInfo('CryosphereMethods: ' . $matchingCryoshphereMethods->getCryosphereMethodsName() . ' has been assigned to expertId: ' . $expert->getId());
        }

        return $response->withStatus(200);
    }

    /**
     *  Remove Expert Methods
     */
    public function removeCryosphereMethodsAction($request, $response, $args) {
        $data = $request->getParsedBody();

        $expertId = trim(strtolower(filter_var($data['id'], FILTER_SANITIZE_NUMBER_INT)));
        $cryosphereMethodsId = filter_var($data['dataId'], FILTER_SANITIZE_NUMBER_INT);
        $cryosphereMethodsName = filter_var($data['dataValue'], FILTER_SANITIZE_STRING);
        $expert = ExpertsQuery::create()->findOneById($expertId);

        $cryoshphereMethods = CryosphereMethodsQuery::create()->filterByApproved(false)->findOneById($cryosphereMethodsId);
        if (!empty($cryoshphereMethods)) {
            $expertCryoshphereMethods = ExpertCryosphereMethodsQuery::create()->filterByExpertId($expertId)->findOneByMethodId($cryoshphereMethods->getId());
        }
        //rest of validations
        if (
                empty($expertCryoshphereMethods) ||
                empty($expert) ||
                $cryoshphereMethods->getCryosphereMethodsName() != $cryosphereMethodsName
        ) {
            $this->container->get('logger')
                    ->addError('Wrong data recieved from ExpertMethods delete call: ' . json_encode($data));

            return $response->withStatus(400);
        }
        $cryoshphereMethods->delete();

        $this->container->get('logger')
                ->addInfo('CryosphereMethods: ' . $cryosphereMethodsName . ' has been removed');

        return $response->withStatus(200);
    }

}
