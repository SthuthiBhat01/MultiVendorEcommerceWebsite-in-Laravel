@extends('sellerfrontend.layouts.main')

@section('main-container')
    <style>
       
        .button1 {
            position: relative;
            padding: 10px 45px;
            background: #6fbf17;
            font-size: 14px;
            font-weight: 400;
            color: #e9f1eb;
            cursor: pointer;
            margin-left: 89rem;
            border: 1px solid #fec195;
            border-radius: 56px;
            filter: drop-shadow(2px 2px 3px rgba(0, 0, 0, 0.2));
        }

        .button1:hover {
            border: 1px solid #f3b182;
            background: linear-gradient(
                85deg,
                #fec195,
                #fcc196,
                #fabd92,
                #fac097,
                #fac39c
            );
            animation: wind 2s ease-in-out infinite;
        }

        @keyframes wind {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 50% 100%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .icon-1,
        .icon-2,
        .icon-3 {
            position: absolute;
            top: 0;
            transition: all 1s ease-in-out;
            filter: drop-shadow(2px 2px 3px rgba(0, 0, 0, 0.5));
        }

        .icon-1 {
            right: 0;
            width: 25px;
            transform-origin: 0 0;
            transform: rotate(10deg);
        }

        .icon-2 {
            left: 25px;
            width: 12px;
            transform-origin: 50% 0;
            transform: rotate(10deg);
        }

        .icon-3 {
            left: 0;
            width: 18px;
            transform-origin: 50% 0;
            transform: rotate(-5deg);
        }

        .button1:hover .icon-1 {
            animation: slay-1 3s cubic-bezier(0.52, 0, 0.58, 1) infinite;
        }

        .button1:hover .icon-2 {
            animation: slay-2 3s cubic-bezier(0.52, 0, 0.58, 1) 1s infinite;
        }

        .button1:hover .icon-3 {
            animation: slay-3 2s cubic-bezier(0.52, 0, 0.58, 1) 1s infinite;
        }

        @keyframes slay-1 {
            0% {
                transform: rotate(10deg);
            }

            50% {
                transform: rotate(-5deg);
            }

            100% {
                transform: rotate(10deg);
            }
        }

        @keyframes slay-2 {
            0% {
                transform: rotate(0deg);
            }

            50% {
                transform: rotate(15deg);
            }

            100% {
                transform: rotate(0);
            }
        }

        @keyframes slay-3 {
            0% {
                transform: rotate(0deg);
            }

            50% {
                transform: rotate(-5deg);
            }

            100% {
                transform: rotate(0);
            }
        }
    </style>

    <main id="listar-main" class="listar-main listar-haslayout">
        <div class="listar-dashboardbanner">
            
            <div class="listar-leftbox">
                <ol class="listar-breadcrumb">
                    <li><a href="javascript:void(0);">Home</a></li>
                    <li class="listar-active">Edit Product</li>
                </ol>
                <h1>Edit Product</h1>
                <div class="listar-description">
                    <p>Edit your product details here...</p>
                </div>
            </div>
        </div>

        <div id="listar-content" class="listar-content">
            <div class="container">
                <h2>Edit Product</h2>

                <form action="{{ route('seller.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" value="{{ $product->slug }}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ $product->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <button type="submit" class="button1">Update Product
                        <div class="icon-1"></div>
                        <div class="icon-2"></div>
                        <div class="icon-3"></div>
                    </button>
                </form>
            </div>
        </div>
    </main>
@endsection
