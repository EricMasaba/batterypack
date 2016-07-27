                <!-- The modal contains the email field -->
                <div class="modal fade" id="confirmBookingModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h5 class="modal-title">Ready to Book?</h5>
                            </div>

                            <div class="modal-body">
                                <div class="dform-group">
                                    <label class="col-xs-3 control-label">Trip Details</label>
                                    <div class="col-xs-6">
                                        <input type="text" class="form-control" name="email" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-5 col-xs-offset-3">
                                        <button type="submit" class="btn btn-success">Confirm</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <style type="text/css">
                    #confirmBookingModal.modal .fade {
                        height: 400px;
                    }

                </style>