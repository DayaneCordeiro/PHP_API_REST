<?php

/**
 * @api {get} api/user/:id Get user by id
 * 
 * @apiHeader{json} Header {"Content-Type": "application/json", "Authorization": Bearer {token}}
 * 
 * @apiName GetUser
 * @apiVersion 2.0.0
 * @apiGroup User
 *
 * @apiParam {Number} id    Users unique ID.
 *
 * @apiSuccess {String} status      Request status.
 * @apiSuccess {String} id          ID of the User.
 * @apiSuccess {String} email       Email of the User.
 * @apiSuccess {String} name        Name of the User.
 * 
 * @apiSuccessExample Request Example:
 *    {
 *        "id"  :   "9"
 *    }
 * 
 * @apiSuccessExample Retunr Example:
 *    {
 *       "status": "success",
 *       "data": {
 *          "id": "5",
 *          "email": "dayane@gmail.com",
 *          "password": "81dc9bdb52d04dc20036dbd8313ed055",
 *          "name": "Glória Peres"
 *       }
 *    }
 */

 /**
 * @api {get} api/user/ Get all users
 * 
 * @apiHeader{json} Header {"Content-Type": "application/json", "Authorization": Bearer {token}}
 * 
 * @apiName GetUser
 * @apiGroup User
 *
 *
 * @apiSuccess {String} status      Request status.
 * @apiSuccess {String} id          ID of the User.
 * @apiSuccess {String} email       Email of the User.
 * @apiSuccess {String} name        Name of the User.
 * 
 * @apiSuccessExample Retunr Example:
 *    {
 *       "status": "success",
 *       "data": {
 *          "id": "9",
 *          "email": "phpapirest@gmail.com",
 *          "password": "abcde1234",
 *          "name": "PHP API REST"
 *       }
 *    }
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
 * @api {put} api/user/update Update user
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

  /**
 * @api {delete} api/user/delete Delete user
 * @apiName Delete
 * @apiGroup User
 *
 * @apiParam {String} id        ID of the User - REQUIRED.
 *
 * @apiSuccess {String} status      Request status.
 * @apiSuccess {String} data        Request message.
 */