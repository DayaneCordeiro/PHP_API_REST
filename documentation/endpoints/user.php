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

 /**
 * @api {get} api/user/ Get all users
 * @apiName GetUser
 * @apiGroup User
 *
 *
 * @apiSuccess {String} status      Request status.
 * @apiSuccess {String} id          ID of the User.
 * @apiSuccess {String} email       Email of the User.
 * @apiSuccess {String} name        Name of the User.
 */

  /**
 * @api {post} api/user/create Creates a new user
 * @apiName Create
 * @apiGroup User
 *
 * @apiParam {String} name      Name of the User.
 * @apiParam {String} email     Email of the User.
 * @apiParam {String} password  Password of the User. 
 *
 * @apiSuccess {String} status      Request status.
 * @apiSuccess {String} data        Request message.
 */

  /**
 * @api {post} api/user/login Log into the system
 * @apiName Login
 * @apiGroup User
 *
 * @apiParam {String} email     Email of the User.
 * @apiParam {String} password  Password of the User. 
 *
 * @apiSuccess {String} status      Request status.
 * @apiSuccess {String} message     Request message.
 * @apiSuccess {String} jwt         Bearer token.
 * @apiSuccess {String} email       Email of user.
 */

  /**
 * @api {post} api/user/update Update user
 * @apiName Update
 * @apiGroup User
 *
 * @apiParam {String} id        ID of the User - REQUIRED.
 * @apiParam {String} name      Name of the User.
 * @apiParam {String} email     Password of the User. 
 * @apiParam {String} password  Password of the User. 
 *
 * @apiSuccess {String} status      Request status.
 * @apiSuccess {String} data        Request message.
 */