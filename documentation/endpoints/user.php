<?php

/**
 * @api {get} api/user/:id Get user by id
 * @apiName GetUser
 * @apiGroup User
 *
 * @apiParam {Number} id    Users unique ID.
 *
 * @apiSuccess {String} status      Request status.
 * @apiSuccess {String} id          ID of the User.
 * @apiSuccess {String} email       Email of the User.
 * @apiSuccess {String} name        Name of the User.
 */