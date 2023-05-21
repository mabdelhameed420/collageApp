<?php

namespace App\Http\Controllers\Api\Chat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Message;
use App\Models\Student;
use App\Models\StudentAffair;
use App\Models\Lecturer;

class ChatController extends Controller
{
    public function index()
    {
        $chats = Chat::get()->all();
        return response()->json([
            'message' => 'Chats retrieved successfully.',
            'data' => $chats
        ], 200);
    }
    public function store(Request $request)
    {
        if (!is_null($request->student_sender_id) && !is_null($request->student_reciver_id)) {
            $chatExists = Chat::where(function ($query) use ($request) {
                $query->where('student_sender_id', $request->student_sender_id)
                    ->where('student_reciver_id', $request->student_reciver_id);
            })
                ->orWhere(function ($query) use ($request) {
                    $query->where('student_sender_id', $request->student_reciver_id)
                        ->where('student_reciver_id', $request->student_sender_id);
                })
                ->first();
            if (!is_null($chatExists)) {
                return response()->json([
                    'message' => 'Chat already exists.',
                    'data' => $chatExists,
                    'statue' => 200
                ], 200);
            } else {
                $chat = Chat::create([
                    'student_sender_id' => $request->student_sender_id,
                    'student_reciver_id' => $request->student_reciver_id,
                    'student_affairs_sender_id' => $request->student_affairs_sender_id,
                    'student_affairs_reciver_id' => $request->student_affairs_reciver_id,
                    'lecturer_sender_id' => $request->lecturer_sender_id,
                    'lecturer_reciver_id' => $request->lecturer_reciver_id,

                ]);
                return response()->json([
                    'message' => 'Chat created successfully.',
                    'data' => $chat
                ], 201);
            }
        } else if (!is_null($request->student_affairs_sender_id) && !is_null($request->student_reciver_id)) {
            $chatExists = Chat::where(function ($query) use ($request) {
                $query->where('student_affairs_sender_id', $request->student_affairs_sender_id)
                    ->where('student_reciver_id', $request->student_reciver_id);
            })
                ->orWhere(function ($query) use ($request) {
                    $query->where('student_affairs_sender_id', $request->student_reciver_id)
                        ->where('student_reciver_id', $request->student_affairs_sender_id);
                })
                ->first();

            if (!is_null($chatExists)) {
                return response()->json([
                    'message' => 'Chat already exists.',
                    'data' => $chatExists,
                    'statue' => 200
                ], 200);
            } else {
                $chat = Chat::create([
                    'student_affairs_sender_id' => $request->student_affairs_sender_id,
                    'student_reciver_id' => $request->student_reciver_id,
                    'student_sender_id' => $request->student_sender_id,
                    'student_affairs_reciver_id' => $request->student_affairs_reciver_id,
                    'lecturer_sender_id' => $request->lecturer_sender_id,
                    'lecturer_reciver_id' => $request->lecturer_reciver_id,

                ]);
                return response()->json([
                    'message' => 'Chat created successfully.',
                    'data' => $chat
                ], 201);
            }
        } else if (!is_null($request->lecturer_sender_id) && !is_null($request->student_reciver_id)) {
            $chatExists = Chat::where(function ($query) use ($request) {
                $query->where('lecturer_sender_id', $request->lecturer_sender_id)
                    ->where('student_reciver_id', $request->student_reciver_id);
            })
                ->orWhere(function ($query) use ($request) {
                    $query->where('lecturer_sender_id', $request->student_reciver_id)
                        ->where('student_reciver_id', $request->lecturer_sender_id);
                })
                ->first();
            if (!is_null($chatExists)) {
                return response()->json([
                    'message' => 'Chat already exists.',
                    'data' => $chatExists,
                    'statue' => 200
                ], 200);
            } else {
                $chat = Chat::create([
                    'lecturer_sender_id' => $request->lecturer_sender_id,
                    'student_reciver_id' => $request->student_reciver_id,
                    'student_sender_id' => $request->student_sender_id,
                    'student_affairs_reciver_id' => $request->student_affairs_reciver_id,
                    'student_affairs_sender_id' => $request->student_affairs_sender_id,
                    'lecturer_reciver_id' => $request->lecturer_reciver_id,

                ]);
                return response()->json([
                    'message' => 'Chat created successfully.',
                    'data' => $chat
                ], 201);
            }
        } else if (!is_null($request->student_sender_id) && !is_null($request->student_affairs_reciver_id)) {
            $chatExists = Chat::where(function ($query) use ($request) {
                $query->where('student_sender_id', $request->student_sender_id)
                    ->where('student_affairs_reciver_id', $request->student_affairs_reciver_id);
            })
                ->orWhere(function ($query) use ($request) {
                    $query->where('student_sender_id', $request->student_affairs_reciver_id)
                        ->where('student_affairs_reciver_id', $request->student_sender_id);
                })
                ->first();
            if (!is_null($chatExists)) {
                return response()->json([
                    'message' => 'Chat already exists.',
                    'data' => $chatExists,
                    'statue' => 200
                ], 200);
            } else {
                $chat = Chat::create([
                    'student_sender_id' => $request->student_sender_id,
                    'student_affairs_reciver_id' => $request->student_affairs_reciver_id,
                    'student_affairs_sender_id' => $request->student_affairs_sender_id,
                    'student_reciver_id' => $request->student_reciver_id,
                    'lecturer_sender_id' => $request->lecturer_sender_id,
                    'lecturer_reciver_id' => $request->lecturer_reciver_id,

                ]);
                return response()->json([
                    'message' => 'Chat created successfully.',
                    'data' => $chat
                ], 201);
            }
        } else if (!is_null($request->student_sender_id) && !is_null($request->lecturer_reciver_id)) {
            $chatExists = Chat::where(function ($query) use ($request) {
                $query->where('student_sender_id', $request->student_sender_id)
                    ->where('lecturer_reciver_id', $request->lecturer_reciver_id);
            })
                ->orWhere(function ($query) use ($request) {
                    $query->where('student_sender_id', $request->lecturer_reciver_id)
                        ->where('lecturer_reciver_id', $request->student_sender_id);
                })
                ->first();
            if (!is_null($chatExists)) {
                return response()->json([
                    'message' => 'Chat already exists.',
                    'data' => $chatExists,
                    'statue' => 200
                ], 200);
            } else {
                $chat = Chat::create([
                    'student_sender_id' => $request->student_sender_id,
                    'lecturer_reciver_id' => $request->lecturer_reciver_id,
                    'student_affairs_sender_id' => $request->student_affairs_sender_id,
                    'student_reciver_id' => $request->student_reciver_id,
                    'student_affairs_reciver_id' => $request->student_affairs_reciver_id,
                    'lecturer_sender_id' => $request->lecturer_sender_id,

                ]);
                return response()->json([
                    'message' => 'Chat created successfully.',
                    'data' => $chat
                ], 201);
            }
        } else if (!is_null($request->student_affairs_sender_id) && !is_null($request->student_affairs_reciver_id)) {
            $chatExists = Chat::where(function ($query) use ($request) {
                $query->where('student_affairs_sender_id', $request->student_affairs_sender_id)
                    ->where('student_affairs_reciver_id', $request->student_affairs_reciver_id);
            })
                ->orWhere(function ($query) use ($request) {
                    $query->where('student_affairs_sender_id', $request->student_affairs_reciver_id)
                        ->where('student_affairs_reciver_id', $request->student_affairs_sender_id);
                })
                ->first();
            if (!is_null($chatExists)) {
                return response()->json([
                    'message' => 'Chat already exists.',
                    'data' => $chatExists,
                    'statue' => 200
                ], 200);
            } else {
                $chat = Chat::create([
                    'student_affairs_sender_id' => $request->student_affairs_sender_id,
                    'student_affairs_reciver_id' => $request->student_affairs_reciver_id,
                    'student_sender_id' => $request->student_sender_id,
                    'student_reciver_id' => $request->student_reciver_id,
                    'lecturer_sender_id' => $request->lecturer_sender_id,
                    'lecturer_reciver_id' => $request->lecturer_reciver_id,

                ]);
                return response()->json([
                    'message' => 'Chat created successfully.',
                    'data' => $chat
                ], 201);
            }
        } else if (!is_null($request->student_affairs_sender_id) && !is_null($request->lecturer_reciver_id)) {
            $chatExists = Chat::where(function ($query) use ($request) {
                $query->where('student_affairs_sender_id', $request->student_affairs_sender_id)
                    ->where('lecturer_reciver_id', $request->lecturer_reciver_id);
            })
                ->orWhere(function ($query) use ($request) {
                    $query->where('student_affairs_sender_id', $request->lecturer_reciver_id)
                        ->where('lecturer_reciver_id', $request->student_affairs_sender_id);
                })
                ->first();
            if (!is_null($chatExists)) {
                return response()->json([
                    'message' => 'Chat already exists.',
                    'data' => $chatExists,
                    'statue' => 200
                ], 200);
            } else {
                $chat = Chat::create([
                    'student_affairs_sender_id' => $request->student_affairs_sender_id,
                    'lecturer_reciver_id' => $request->lecturer_reciver_id,
                    'student_sender_id' => $request->student_sender_id,
                    'student_reciver_id' => $request->student_reciver_id,
                    'student_affairs_reciver_id' => $request->student_affairs_reciver_id,
                    'lecturer_sender_id' => $request->lecturer_sender_id,


                ]);
                return response()->json([
                    'message' => 'Chat created successfully.',
                    'data' => $chat
                ], 201);
            }
        } else if (!is_null($request->lecturer_sender_id) && !is_null($request->student_affairs_reciver_id)) {
            $chatExists = Chat::where(function ($query) use ($request) {
                $query->where('lecturer_sender_id', $request->lecturer_sender_id)
                    ->where('student_affairs_reciver_id', $request->student_affairs_reciver_id);
            })
                ->orWhere(function ($query) use ($request) {
                    $query->where('lecturer_sender_id', $request->student_affairs_reciver_id)
                        ->where('student_affairs_reciver_id', $request->lecturer_sender_id);
                })
                ->first();
            if (!is_null($chatExists)) {
                return response()->json([
                    'message' => 'Chat already exists.',
                    'data' => $chatExists,
                    'statue' => 200
                ], 200);
            } else {
                $chat = Chat::create([
                    'lecturer_sender_id' => $request->lecturer_sender_id,
                    'student_affairs_reciver_id' => $request->student_affairs_reciver_id,
                    'student_sender_id' => $request->student_sender_id,
                    'student_reciver_id' => $request->student_reciver_id,
                    'student_affairs_sender_id' => $request->student_affairs_sender_id,
                    'lecturer_reciver_id' => $request->lecturer_reciver_id,

                ]);
                return response()->json([
                    'message' => 'Chat created successfully.',
                    'data' => $chat
                ], 201);
            }
        } else if (!is_null($request->lecturer_sender_id) && !is_null($request->lecturer_reciver_id)) {
            $chatExists = Chat::where(function ($query) use ($request) {
                $query->where('lecturer_sender_id', $request->lecturer_sender_id)
                    ->where('lecturer_reciver_id', $request->lecturer_reciver_id);
            })
                ->orWhere(function ($query) use ($request) {
                    $query->where('lecturer_sender_id', $request->lecturer_reciver_id)
                        ->where('lecturer_reciver_id', $request->lecturer_sender_id);
                })
                ->first();
            if (!is_null($chatExists)) {
                return response()->json([
                    'message' => 'Chat already exists.',
                    'data' => $chatExists,
                    'statue' => 200
                ], 200);
            } else {
                $chat = Chat::create([
                    'lecturer_sender_id' => $request->lecturer_sender_id,
                    'lecturer_reciver_id' => $request->lecturer_reciver_id,
                    'student_sender_id' => $request->student_sender_id,
                    'student_reciver_id' => $request->student_reciver_id,
                    'student_affairs_sender_id' => $request->student_affairs_sender_id,
                    'student_affairs_reciver_id' => $request->student_affairs_reciver_id,

                ]);
                return response()->json([
                    'message' => 'Chat created successfully.',
                    'data' => $chat
                ], 201);
            }
        }
    }


    public function show(Chat $chat)
    {
        return response()->json(['data' => $chat], 200);
    }
    public function update(Request $request, Chat $chat)
    {
        $chat->update($request->all());

        return response()->json([
            'message' => 'Chat updated successfully.',
            'data' => $chat,
            'statue' => 200
        ], 200);
    }
    public function destroy(Chat $chat)
    {
        $chat->delete();

        return response()->json([
            'message' => 'Chat deleted successfully.',
            'data' => $chat,
            'statue' => 200
        ], 200);
    }
    public function getMessagesByChatId(Request $request)
    {
        $messages = Message::join('chats', 'chats.id', '=', 'messages.chat_id')
            ->where('messages.chat_id', $request->chat_id)
            ->get(['messages.*']);
        return response()->json([
            'message' => 'Messages retrieved successfully.',
            'data' => $messages,
            'statue' => 200
        ], 200);
    }
    public function getChatsByStudentId(Request $request)
    {
        $chats = Chat::where('student_sender_id', $request->student_id)
            ->orWhere('student_reciver_id', $request->student_id)
            ->get();
        foreach ($chats as $chat) {
            $reciver_id = $chat->student_reciver_id;
            $reciver = Student::where('id', $reciver_id)->first();
            $chat->reciver_name = $reciver->firstname . ' ' . $reciver->lastname;
            $chat->reciver_image = $reciver->image;
        }

        return response()->json([
            'message' => 'Chats retrieved successfully.',
            'data' => $chats,
            'statue' => 200
        ], 200);
    }
    public function getChatsByStudentAffairsId(Request $request)
    {
        $chats = Chat::where('student_affairs_sender_id', $request->student_affairs_id)
            ->get();
        foreach ($chats as $chat) {
            $reciver_id = $chat->student_affairs_reciver_id;
            $reciver = StudentAffair::where('id', $reciver_id)->first();
            $chat->reciver_name = $reciver->firstname . ' ' . $reciver->lastname;
            $chat->reciver_image = $reciver->image;
        }
        return response()->json([
            'message' => 'Chats retrieved successfully.',
            'data' => $chats,
            'statue' => 200
        ], 200);
    }
    public function getChatsByLecturerId(Request $request)
    {
        $chats = Chat::where('lecturer_sender_id', $request->lecturer_id)
            ->get();
        foreach ($chats as $chat) {
            $reciver_id = $chat->lecturer_reciver_id;
            $reciver = Lecturer::where('id', $reciver_id)->first();
            $chat->reciver_name = $reciver->firstname . ' ' . $reciver->lastname;
            $chat->reciver_image = $reciver->image;
        }
        return response()->json([
            'message' => 'Chats retrieved successfully.',
            'data' => $chats,
            'statue' => 200
        ], 200);
    }
}
