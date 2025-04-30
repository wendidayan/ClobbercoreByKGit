<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\Customer;
use App\Models\Review;
use App\Models\ReviewImage;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    //

    public function rateOrder(Request $request, $orderId)
    {
        
        // Retrieve inputs using dynamic field names (with order ID suffix)
        $productRating = $request->input('product_quality_rating_' . $orderId);
        $sellerRating = $request->input('seller_service_rating_' . $orderId);
        $deliveryRating = $request->input('delivery_service_rating_' . $orderId);
        $comment = $request->input('comment_' . $orderId);

        // Check if checkbox is checked (show_username)
        $showUsername = $request->input('show_username_' . $orderId, 0);

    
        // Validate ratings manually since dynamic field names are used
        if (!$productRating && !$sellerRating && !$deliveryRating && !$comment) {
            return redirect()->back()->withErrors(['ratings' => 'You must provide at least one rating or comment.']);
        }
    
        // Get the order and make sure it belongs to this user
        $order = Order::findOrFail($orderId);
        if ($order->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'You cannot review this order.');
        }
    
        // Prevent duplicate reviews
        $existingReview = Review::where('user_id', Auth::id())
                                ->where('order_id', $orderId)
                                ->first();
        if ($existingReview) {
            return redirect()->back()->with('error', 'You have already reviewed this order.');
        }
    
        // Save the review
        try {
           // Save the review and assign it to a variable
            $review = Review::create([
                'user_id' => Auth::id(),
                'order_id' => $order->id,
                'product_quality_rating' => $productRating,
                'seller_service_rating' => $sellerRating,
                'delivery_service_rating' => $deliveryRating,
                'comment' => $comment,
                'show_username' => $showUsername,
            ]);


             // Handle uploaded images (multiple files allowed)
            if ($request->hasFile('review_images_' . $orderId)) {
                foreach ($request->file('review_images_' . $orderId) as $image) {
                    $path = $image->store('review_images', 'public'); // save to storage/app/public/review_images

                    ReviewImage::create([
                        'review_id' => $review->id,
                        'image_path' => $path,
                    ]);
                }
            }

        } catch (\Exception $e) {
            \Log::error('Error saving review:', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'An error occurred while saving your review.');
        }
    
        return redirect()->route('UserProfile')->with('rate_added', true);
    }
    
}
