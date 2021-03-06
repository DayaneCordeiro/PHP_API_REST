define({ "api": [
  {
    "type": "post",
    "url": "api/user/create",
    "title": "Creates a new user",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "json",
            "optional": false,
            "field": "Header",
            "description": "<p>{&quot;Content-Type&quot;: &quot;application/json&quot;}</p>"
          }
        ]
      }
    },
    "name": "Create",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of the User.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email of the User.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>Password of the User.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>Request status.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data",
            "description": "<p>Request message.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Request Example:",
          "content": "{\n    \"name\"     :   \"PHP API REST\",\n    \"email\"    :   \"phpapirest@gmail.com\",\n    \"password\" :   \"abcde1234\"\n}",
          "type": "json"
        },
        {
          "title": "Return Example:",
          "content": "{\n   \"status\" : \"success\",\n   \"data\"   : \"User successfully inserted.\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "endpoints/user.php",
    "groupTitle": "User"
  },
  {
    "type": "delete",
    "url": "api/user/delete",
    "title": "Delete user",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "json",
            "optional": false,
            "field": "Header",
            "description": "<p>{&quot;Content-Type&quot;: &quot;application/json&quot;, &quot;Authorization&quot;: Bearer {token}}</p>"
          }
        ]
      }
    },
    "name": "Delete",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "id",
            "description": "<p>ID of the User - REQUIRED.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>Request status.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data",
            "description": "<p>Request message.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Request Example:",
          "content": "{\n    \"id\"       :   \"9\",\n}",
          "type": "json"
        },
        {
          "title": "Return Example:",
          "content": "{\n    \"status\" : \"success\",\n    \"data\"   : \"User successfully deleted.\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "endpoints/user.php",
    "groupTitle": "User"
  },
  {
    "type": "get",
    "url": "api/user/get/:id",
    "title": "Get user",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "json",
            "optional": false,
            "field": "Header",
            "description": "<p>{&quot;Content-Type&quot;: &quot;application/json&quot;, &quot;Authorization&quot;: Bearer {token}}</p>"
          }
        ]
      }
    },
    "name": "GetUser",
    "version": "2.0.0",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Users unique ID.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>Request status.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "id",
            "description": "<p>ID of the User.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email of the User.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of the User.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Return Example:",
          "content": "{\n   \"status\": \"success\",\n   \"data\": {\n      \"id\": \"9\",\n      \"email\": \"phpapirest@gmail.com\",\n      \"name\": \"PHP API REST\"\n   }\n}",
          "type": "json"
        }
      ]
    },
    "filename": "endpoints/user.php",
    "groupTitle": "User"
  },
  {
    "type": "get",
    "url": "api/user/get/",
    "title": "Get all users",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "json",
            "optional": false,
            "field": "Header",
            "description": "<p>{&quot;Content-Type&quot;: &quot;application/json&quot;, &quot;Authorization&quot;: Bearer {token}}</p>"
          }
        ]
      }
    },
    "name": "GetUser",
    "group": "User",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>Request status.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "id",
            "description": "<p>ID of the User.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email of the User.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of the User.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Return Example:",
          "content": "{\n   \"status\": \"success\",\n   \"data\": {\n      \"id\": \"9\",\n      \"email\": \"phpapirest@gmail.com\",\n      \"name\": \"PHP API REST\"\n   }\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "endpoints/user.php",
    "groupTitle": "User"
  },
  {
    "type": "post",
    "url": "api/user/login",
    "title": "Log into the system",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "json",
            "optional": false,
            "field": "Header",
            "description": "<p>{&quot;Content-Type&quot;: &quot;application/json&quot;, &quot;Authorization&quot;: Bearer {token}}</p>"
          }
        ]
      }
    },
    "name": "Login",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email of the User.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>Password of the User.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>Request status.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>Request message.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Bearer token.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email of user.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Request Example:",
          "content": "{\n    \"email\"    :   \"phpapirest@gmail.com\",\n    \"password\" :   \"abcde1234\"\n}",
          "type": "json"
        },
        {
          "title": "Return Example:",
          "content": "{\n    \"status\": \"success\",\n    \"data\": {\n       \"message\": \"Successfully logged in.\",\n       \"token\": \"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.NsaWVudCIsImlJpYSBQZXJlcyJ9fQ.ekeJwAwycGRTaS9DyL10dFy5JhZZwsagx8l-Z_MOpcA\",\n       \"email\": \"phpapirest@gmail.com\"\n    }\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "endpoints/user.php",
    "groupTitle": "User"
  },
  {
    "type": "put",
    "url": "api/user/update",
    "title": "Update user",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "json",
            "optional": false,
            "field": "Header",
            "description": "<p>{&quot;Content-Type&quot;: &quot;application/json&quot;, &quot;Authorization&quot;: Bearer {token}}</p>"
          }
        ]
      }
    },
    "name": "Update",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "id",
            "description": "<p>ID of the User - REQUIRED.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of the User.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Password of the User.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>Password of the User.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>Request status.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data",
            "description": "<p>Request message.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Request Example:",
          "content": "{\n    \"id\"       :   \"9\",\n    \"name\"     :   \"PHP API REST\"\n}",
          "type": "json"
        },
        {
          "title": "Return Example:",
          "content": "{\n    \"status\" : \"success\",\n    \"data\"   : \"User successfully updated.\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "endpoints/user.php",
    "groupTitle": "User"
  }
] });
